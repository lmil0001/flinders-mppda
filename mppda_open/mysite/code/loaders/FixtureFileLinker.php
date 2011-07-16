<?php
/**
 * Contains a number of callbacks that are run after the records fixture is
 * imported which link the documents and scans to actual file objects.
 *
 * @package mppda
 */
class FixtureFileLinker {

	public static function run(YamlFixture $fixture) {
		// Loop through each document, and attempt to look for a matching
		// file in /assets/Documents (either a .doc or .txt extension).
		$folder  = Folder::findOrMake(Document::DOCUMENTS_DIR);
		$linked  = 0;
		$deleted = 0;

		foreach ($fixture->allFixtureIDs('Document') as $document) {
			$document = DataObject::get_by_id(
				'Document', $document
			);

			$file = DataObject::get_one('File', sprintf(
				'"ParentID" = %d AND "Name" LIKE \'%s%%\'', $folder->ID, $document->Title
			));

			if ($file) {
				$document->FileID = $file->ID;
				$document->write();

				++$linked;
			} else {
				$document->delete();
				++$deleted;
			}
		}

		DB::alteration_message("Linked $linked documents to file objects.", 'created');
		DB::alteration_message("Deleted $deleted obsolete document objects.", 'deleted');

		$scans = 0;

		// Now loop through each reel, and link up the files present in
		// /assets/<folder>/.
		foreach ($fixture->allFixtureIDs('Reel') as $reel) {
			$reel = DataObject::get_by_id(
				'Reel', $reel
			);

			$images = DataObject::get('Image', sprintf(
				'"ParentID" = %d', $reel->FolderID
			));

			if ($images) foreach ($images as $image) {
				if (!preg_match('/^[0-9]+-([0-9]+)/', $image->Name, $matches)) {
					continue;
				}

				$scan = new Scan();
				$scan->Number      = ltrim($matches[1], '0');
				$scan->ThumbnailID = $image->ID;
				$scan->ReelID      = $reel->ID;
				$scan->write();

				++$scans;
			}
		}

		DB::alteration_message("Linked $scans scan images.", 'created');

		// Finally, associate the actual records to the scans.
		$assoc = 0;

		foreach ($fixture->allFixtureIDs('Record') as $record) {
			$record = DataObject::get_by_id('Record', $record);

			$ids   = array();
			$reel  = $record->Reel()->Number;
			$start = substr($record->FrameStart, strlen($reel));
			$end   = substr($record->FrameEnd, strlen($reel));

			if (!$start && !$end) {
				continue;
			}

			if ($end) {
				$scans = range($start, $end);
				$max   = DB::query(sprintf(
					'SELECT MAX("Number") FROM "Scan" WHERE "ReelID" = %d',
					$record->ReelID
				));

				if ($end > $max->value()) {
					DB::alteration_message(
						"Invalid end value $end for record #{$record->ID} removed.",
						'deleted'
					);
					$scans = array($start);
				}
			} else {
				$scans = array($start);
			}

			foreach ($scans as $scan) {
				$id = DB::query(sprintf(
					'SELECT "ID" FROM "Scan" WHERE "ReelID" = %d AND "Number" = %d',
					$record->ReelID, $scan
				));
				$id = $id->value();

				if ($id) {
					$ids[] = $id;
					++$assoc;
				} else {
					DB::alteration_message(
						"Could not find scan #$scan on reel #$reel for record #{$record->ID}, skipped.",
						'deleted'
					);
				}
			}

			$record->Scans()->setByIDList($ids);
		}

		DB::alteration_message("Associated $assoc scans to records.", 'created');
	}

}