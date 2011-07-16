<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="$ContentLocale" xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <% base_tag %>
        <title>$SiteConfig.Title - <% if MetaTitle %>$MetaTitle<% else %>$Title<% end_if %></title>
	$MetaTags(false)
        $SiteConfig.getDublinCoreStatic
        <link rel="shortcut icon" href="/favicon.ico" />

        <% require themedCSS(layout) %>
        <% require themedCSS(typography) %>
        <% require themedCSS(form) %>

        <!--[if IE 6]>
	<style type="text/css">
           @import url(themes/mppda/css/IE6.css);
	</style>
	<![endif]-->
        <!--[if IE 7]>
        <style type="text/css">
            form#SearchForm_SearchForm fieldset {
                margin-top: -13px;
            }
	</style>
        <![endif]-->
    </head>
    <body id="top">
        <div id="wrap">
            <% include Header %>
            <div id="main">
		$Layout
            </div>
        </div>
        <% include Footer %>
    </body>
</html>