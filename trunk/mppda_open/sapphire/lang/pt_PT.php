<?php

/**
 * Portuguese (Portugal) language pack
 * @package sapphire
 * @subpackage i18n
 */

i18n::include_locale_file('sapphire', 'en_US');

global $lang;

if(array_key_exists('pt_PT', $lang) && is_array($lang['pt_PT'])) {
	$lang['pt_PT'] = array_merge($lang['en_US'], $lang['pt_PT']);
} else {
	$lang['pt_PT'] = $lang['en_US'];
}

$lang['pt_PT']['BankAccountField']['VALIDATIONJS'] = 'Por favor introduza um número de conta bancária válido.';
$lang['pt_PT']['BasicAuth']['ENTERINFO'] = 'Por favor insira um nome de utilizador e password.';
$lang['pt_PT']['BasicAuth']['ERRORNOTADMIN'] = 'Esse utilizador não é um administrador.';
$lang['pt_PT']['BasicAuth']['ERRORNOTREC'] = 'Esse nome de utilizador / password não é válido';
$lang['pt_PT']['BBCodeParser']['ALIGNEMENT'] = 'Alinhamento';
$lang['pt_PT']['BBCodeParser']['ALIGNEMENTEXAMPLE'] = 'Alinhado à direita';
$lang['pt_PT']['BBCodeParser']['BOLD'] = 'Texto Negrito';
$lang['pt_PT']['BBCodeParser']['BOLDEXAMPLE'] = 'Negrito';
$lang['pt_PT']['BBCodeParser']['COLORED'] = 'Texto colorido';
$lang['pt_PT']['BBCodeParser']['COLOREDEXAMPLE'] = 'Texto azul';
$lang['pt_PT']['BBCodeParser']['ITALIC'] = 'Texto Itálico';
$lang['pt_PT']['BBCodeParser']['ITALICEXAMPLE'] = 'Itálico';
$lang['pt_PT']['BBCodeParser']['UNDERLINE'] = 'Texto Sublinhado';
$lang['pt_PT']['BBCodeParser']['UNDERLINEEXAMPLE'] = 'Sublinhado';
$lang['pt_PT']['ChangePasswordEmail.ss']['CHANGEPASSWORDTEXT1'] = 'Modificou a sua password para';
$lang['pt_PT']['ChangePasswordEmail.ss']['CHANGEPASSWORDTEXT2'] = 'Pode utilizar agora as seguintes credenciais para se autenticar:';
$lang['pt_PT']['ChangePasswordEmail.ss']['HELLO'] = 'Olá';
$lang['pt_PT']['ComplexTableField.ss']['ADDITEM'] = 'Adicionar %s';
$lang['pt_PT']['ComplexTableField.ss']['NOITEMSFOUND'] = 'Nenhum item encontrado';
$lang['pt_PT']['ComplexTableField.ss']['SORTASC'] = 'Ordenar ascendente';
$lang['pt_PT']['ComplexTableField.ss']['SORTDESC'] = 'Ordenar descendente';
$lang['pt_PT']['ComplexTableField_popup.ss']['NEXT'] = 'Próximo';
$lang['pt_PT']['ComplexTableField_popup.ss']['PREVIOUS'] = 'Anterior';
$lang['pt_PT']['CompositeDateField']['DAY'] = 'Dia';
$lang['pt_PT']['CompositeDateField']['DAYJS'] = 'dia';
$lang['pt_PT']['CompositeDateField']['MONTH'] = 'Mês';
$lang['pt_PT']['CompositeDateField']['MONTHJS'] = 'mês';
$lang['pt_PT']['CompositeDateField']['VALIDATIONJS1'] = 'Confirme se inseriu ';
$lang['pt_PT']['CompositeDateField']['VALIDATIONJS2'] = 'correctamente.';
$lang['pt_PT']['CompositeDateField']['YEARJS'] = 'ano';
$lang['pt_PT']['ConfirmedFormAction']['CONFIRMATION'] = 'Tem a certeza?';
$lang['pt_PT']['ConfirmedPasswordField']['ATLEAST'] = 'As passwords devem ter pelo menos %s caracteres.';
$lang['pt_PT']['ConfirmedPasswordField']['BETWEEN'] = 'As passwords devem ter entre %s e %s caracteres.';
$lang['pt_PT']['ConfirmedPasswordField']['HAVETOMATCH'] = 'As passwords têm de ser idênticas.';
$lang['pt_PT']['ConfirmedPasswordField']['LEASTONE'] = 'As passwords devem ter pelo menos um dígito e uma letra.';
$lang['pt_PT']['ConfirmedPasswordField']['MAXIMUM'] = 'As passwords podem ter no máximo %s caracteres.';
$lang['pt_PT']['ConfirmedPasswordField']['NOEMPTY'] = 'As passwords não podem ser nulas.';
$lang['pt_PT']['ConfirmedPasswordField']['SHOWONCLICKTITLE'] = 'Mudar password';
$lang['pt_PT']['ContentController']['DRAFT_SITE_ACCESS_RESTRICTION'] = 'Tem de se autenticar para ver o conteúdo de rascunho ou arquivado. <a href="%s">Clique aqui para voltar ao site publicado</a>';
$lang['pt_PT']['Controller']['FILE'] = 'Ficheiro';
$lang['pt_PT']['Controller']['IMAGE'] = 'Imagem';
$lang['pt_PT']['CreditCardField']['FIRST'] = 'primeiro';
$lang['pt_PT']['CreditCardField']['FOURTH'] = 'quarto';
$lang['pt_PT']['CreditCardField']['SECOND'] = 'segundo';
$lang['pt_PT']['CreditCardField']['THIRD'] = 'terceiro';
$lang['pt_PT']['CreditCardField']['VALIDATIONJS1'] = 'Por favor verifique se inseriu';
$lang['pt_PT']['CreditCardField']['VALIDATIONJS2'] = 'o numero de cartão de crédito correctamente.';
$lang['pt_PT']['DataObject']['PLURALNAME'] = 'Objectos de Dados';
$lang['pt_PT']['DataObject']['SINGULARNAME'] = 'Objecto de Dados';
$lang['pt_PT']['Date']['DAY'] = 'dia';
$lang['pt_PT']['Date']['DAYS'] = 'dias';
$lang['pt_PT']['Date']['HOUR'] = 'hora';
$lang['pt_PT']['Date']['HOURS'] = 'horas';
$lang['pt_PT']['Date']['MIN'] = 'min';
$lang['pt_PT']['Date']['MINS'] = 'mins';
$lang['pt_PT']['Date']['MONTH'] = 'mês';
$lang['pt_PT']['Date']['MONTHS'] = 'meses';
$lang['pt_PT']['Date']['SEC'] = 'seg';
$lang['pt_PT']['Date']['SECS'] = 'segs';
$lang['pt_PT']['Date']['TIMEDIFFAGO'] = 'à %s';
$lang['pt_PT']['Date']['TIMEDIFFAWAY'] = 'à %s';
$lang['pt_PT']['Date']['YEAR'] = 'ano';
$lang['pt_PT']['Date']['YEARS'] = 'anos';
$lang['pt_PT']['DateField']['NOTSET'] = 'Não inserido';
$lang['pt_PT']['DateField']['TODAY'] = 'Hoje';
$lang['pt_PT']['DateField']['VALIDATIONJS'] = 'Insira uma data no formato correcto (DD-MM-AAAA)';
$lang['pt_PT']['DateField']['VALIDDATEFORMAT'] = 'Por favor insira uma data no formato válido (DD/MM/AAAA).';
$lang['pt_PT']['DMYDateField']['VALIDDATEFORMAT'] = 'Insira uma data no formato correcto (DD-MM-AAAA)';
$lang['pt_PT']['DropdownField']['CHOOSE'] = '(Escolha)';
$lang['pt_PT']['EmailField']['VALIDATION'] = 'Por favor insira um endereço de email.';
$lang['pt_PT']['EmailField']['VALIDATIONJS'] = 'Por favor insira um endereço de e-mail válido.';
$lang['pt_PT']['ErrorPage']['401'] = '401 - Não Autorizado';
$lang['pt_PT']['ErrorPage']['403'] = '403 - Proibido';
$lang['pt_PT']['ErrorPage']['404'] = '404 - Não Encontrado';
$lang['pt_PT']['ErrorPage']['407'] = '407 - Autenticação Proxy Necessária';
$lang['pt_PT']['ErrorPage']['409'] = '409 - Conflicto';
$lang['pt_PT']['ErrorPage']['415'] = '415 - Tipo media não suportado';
$lang['pt_PT']['ErrorPage']['500'] = '500 - Erro de Servidor';
$lang['pt_PT']['ErrorPage']['503'] = '503 - Serviço Indisponível';
$lang['pt_PT']['ErrorPage']['505'] = '505 - Versão HTTP não suportada';
$lang['pt_PT']['ErrorPage']['CODE'] = 'Código de erro';
$lang['pt_PT']['ErrorPage']['DEFAULTERRORPAGECONTENT'] = '<p>A página a que tentou aceder não existe.</p><p>Verifique se não existem erros no endereço a que tentou aceder e tente novamente.</p>';
$lang['pt_PT']['ErrorPage']['DEFAULTERRORPAGETITLE'] = 'Página não encontrada';
$lang['pt_PT']['ErrorPage']['PLURALNAME'] = 'Páginas de Erro';
$lang['pt_PT']['ErrorPage']['SINGULARNAME'] = 'Página de erro';
$lang['pt_PT']['File']['INVALIDEXTENSION'] = 'Extensão não permitida (válida: %s)';
$lang['pt_PT']['File']['NOFILESIZE'] = 'O tamanho do ficheiro é de 0 bytes.';
$lang['pt_PT']['File']['PLURALNAME'] = 'Ficheiros';
$lang['pt_PT']['File']['SINGULARNAME'] = 'Ficheiro';
$lang['pt_PT']['File']['TOOLARGE'] = 'O tamanho do ficheiro é demasiado grande, o máximo permitido é %s.';
$lang['pt_PT']['Folder']['DELSELECTED'] = 'Apagar os ficheiros seleccionados';
$lang['pt_PT']['Folder']['DETAILSTAB'] = 'Detalhes';
$lang['pt_PT']['Folder']['FILENAME'] = 'Nome do Ficheiro';
$lang['pt_PT']['Folder']['FILESTAB'] = 'Ficheiros';
$lang['pt_PT']['Folder']['PLURALNAME'] = 'Ficheiros';
$lang['pt_PT']['Folder']['SINGULARNAME'] = 'Ficheiro';
$lang['pt_PT']['Folder']['TITLE'] = 'Título';
$lang['pt_PT']['Folder']['TYPE'] = 'Tipo';
$lang['pt_PT']['Folder']['UNUSEDFILESTAB'] = 'Ficheiros não utilizados';
$lang['pt_PT']['Folder']['UNUSEDFILESTITLE'] = 'Ficheiros não utilizados';
$lang['pt_PT']['Folder']['UPLOADTAB'] = 'Enviar';
$lang['pt_PT']['ForgotPasswordEmail.ss']['HELLO'] = 'Olá';
$lang['pt_PT']['ForgotPasswordEmail.ss']['TEXT1'] = 'Este é o seu';
$lang['pt_PT']['ForgotPasswordEmail.ss']['TEXT2'] = 'link para alterar password';
$lang['pt_PT']['ForgotPasswordEmail.ss']['TEXT3'] = 'para';
$lang['pt_PT']['Form']['DATENOTSET'] = '(Nenhuma data inserida)';
$lang['pt_PT']['Form']['FIELDISREQUIRED'] = '%s é de preenchimento obrigatório';
$lang['pt_PT']['Form']['LANGAOTHER'] = 'Outras línguas';
$lang['pt_PT']['Form']['LANGAVAIL'] = 'Línguas disponíveis';
$lang['pt_PT']['Form']['NOTSET'] = '(não definido)';
$lang['pt_PT']['Form']['VALIDATIONALLDATEVALUES'] = 'Por favor certifique-se que inseriu todas as datas';
$lang['pt_PT']['Form']['VALIDATIONBANKACC'] = 'Por favor insira um número de banco válido';
$lang['pt_PT']['Form']['VALIDATIONCREDITNUMBER'] = 'Por favor certifique-se que inseriu o número do cartão de crédito %s correctamente.';
$lang['pt_PT']['Form']['VALIDATIONFAILED'] = 'Campo de validação';
$lang['pt_PT']['Form']['VALIDATIONNOTUNIQUE'] = 'O valor inserido não é único';
$lang['pt_PT']['Form']['VALIDATIONPASSWORDSDONTMATCH'] = 'Passwords não coincidem';
$lang['pt_PT']['Form']['VALIDATIONPASSWORDSNOTEMPTY'] = 'Passwords não podem estar em branco';
$lang['pt_PT']['Form']['VALIDATIONSTRONGPASSWORD'] = 'Passwords devem ter ao menos 1 dígito e 1 alfanumérico.';
$lang['pt_PT']['Form']['VALIDCURRENCY'] = 'Por favor insira uma moeda válida.';
$lang['pt_PT']['FormField']['NONE'] = 'nenhum';
$lang['pt_PT']['GhostPage']['NOLINKED'] = 'Esta página fantasma não tem nenhum link.';
$lang['pt_PT']['GhostPage']['PLURALNAME'] = 'Páginas Fantasma';
$lang['pt_PT']['GhostPage']['SINGULARNAME'] = 'Página Fantasma';
$lang['pt_PT']['Group']['Code'] = 'Grupo de código';
$lang['pt_PT']['Group']['has_many_Permissions'] = 'Permissões';
$lang['pt_PT']['Group']['Locked'] = 'Fechado?';
$lang['pt_PT']['Group']['many_many_Members'] = 'Membros';
$lang['pt_PT']['Group']['Parent'] = 'Grupo pai';
$lang['pt_PT']['Group']['PLURALNAME'] = 'Grupos';
$lang['pt_PT']['Group']['SINGULARNAME'] = 'Grupo';
$lang['pt_PT']['GSTNumberField']['VALIDATION'] = 'Por favor insira um número GST válido';
$lang['pt_PT']['GSTNumberField']['VALIDATIONJS'] = 'Insira um número GST valido';
$lang['pt_PT']['HtmlEditorField']['ALTTEXT'] = 'Descrição';
$lang['pt_PT']['HtmlEditorField']['ANCHOR'] = 'Inserir/editar âncora';
$lang['pt_PT']['HtmlEditorField']['BULLETLIST'] = 'Lista sem ordenação';
$lang['pt_PT']['HtmlEditorField']['BUTTONALIGNCENTER'] = 'Alinhar ao Centro';
$lang['pt_PT']['HtmlEditorField']['BUTTONALIGNJUSTIFY'] = 'Justificado';
$lang['pt_PT']['HtmlEditorField']['BUTTONALIGNLEFT'] = 'Alinhar à Esquerda';
$lang['pt_PT']['HtmlEditorField']['BUTTONALIGNRIGHT'] = 'Alinhar à Direita';
$lang['pt_PT']['HtmlEditorField']['BUTTONBOLD'] = 'Negrito (Ctrl+B)';
$lang['pt_PT']['HtmlEditorField']['BUTTONINSERTFLASH'] = 'Inserir Flash';
$lang['pt_PT']['HtmlEditorField']['BUTTONINSERTIMAGE'] = 'Inserir imagem';
$lang['pt_PT']['HtmlEditorField']['BUTTONINSERTLINK'] = 'Inserir link';
$lang['pt_PT']['HtmlEditorField']['BUTTONITALIC'] = 'Itálico (Ctrl+I)';
$lang['pt_PT']['HtmlEditorField']['BUTTONREMOVELINK'] = 'Remover link';
$lang['pt_PT']['HtmlEditorField']['BUTTONSTRIKE'] = 'Rasurado';
$lang['pt_PT']['HtmlEditorField']['BUTTONUNDERLINE'] = 'Sublinhado (Ctrl+U)';
$lang['pt_PT']['HtmlEditorField']['CHARMAP'] = 'Inserir Símbolo';
$lang['pt_PT']['HtmlEditorField']['CLOSE'] = 'fechar';
$lang['pt_PT']['HtmlEditorField']['COPY'] = 'Copiar (Ctrl+C)';
$lang['pt_PT']['HtmlEditorField']['CREATEFOLDER'] = 'criar pasta';
$lang['pt_PT']['HtmlEditorField']['CSSCLASS'] = 'Alinhamento / estilo';
$lang['pt_PT']['HtmlEditorField']['CSSCLASSCENTER'] = 'Centrado sozinho.';
$lang['pt_PT']['HtmlEditorField']['CSSCLASSLEFT'] = 'Na esquerda, com texto envolvido.';
$lang['pt_PT']['HtmlEditorField']['CSSCLASSRIGHT'] = 'Na direita, com texto envolvido.';
$lang['pt_PT']['HtmlEditorField']['CUT'] = 'Cortar (Ctrl+X)';
$lang['pt_PT']['HtmlEditorField']['DELETECOL'] = 'Apagar coluna';
$lang['pt_PT']['HtmlEditorField']['DELETEROW'] = 'Apagar linha';
$lang['pt_PT']['HtmlEditorField']['EDITCODE'] = 'Editar Código HTML';
$lang['pt_PT']['HtmlEditorField']['EMAIL'] = 'Endereço email';
$lang['pt_PT']['HtmlEditorField']['FILE'] = 'Ficheiro';
$lang['pt_PT']['HtmlEditorField']['FLASH'] = 'Inserir flash';
$lang['pt_PT']['HtmlEditorField']['FOLDER'] = 'Pasta';
$lang['pt_PT']['HtmlEditorField']['FOLDERCANCEL'] = 'cancelar';
$lang['pt_PT']['HtmlEditorField']['FORMATADDR'] = 'Morada';
$lang['pt_PT']['HtmlEditorField']['FORMATH1'] = 'Cabeçalho 1';
$lang['pt_PT']['HtmlEditorField']['FORMATH2'] = 'Cabeçalho 2';
$lang['pt_PT']['HtmlEditorField']['FORMATH3'] = 'Cabeçalho 3';
$lang['pt_PT']['HtmlEditorField']['FORMATH4'] = 'Cabeçalho 4';
$lang['pt_PT']['HtmlEditorField']['FORMATH5'] = 'Cabeçalho 5';
$lang['pt_PT']['HtmlEditorField']['FORMATH6'] = 'Cabeçalho 6';
$lang['pt_PT']['HtmlEditorField']['FORMATP'] = 'Parágrafo';
$lang['pt_PT']['HtmlEditorField']['FORMATPRE'] = 'Preformatado';
$lang['pt_PT']['HtmlEditorField']['HR'] = 'Inserir Linha Horizontal';
$lang['pt_PT']['HtmlEditorField']['IMAGE'] = 'Inserir imagem';
$lang['pt_PT']['HtmlEditorField']['IMAGEDIMENSIONS'] = 'Dimensões';
$lang['pt_PT']['HtmlEditorField']['IMAGEHEIGHTPX'] = 'Altura';
$lang['pt_PT']['HtmlEditorField']['IMAGEWIDTHPX'] = 'Largura';
$lang['pt_PT']['HtmlEditorField']['INDENT'] = 'Aumentar tabulação';
$lang['pt_PT']['HtmlEditorField']['INSERTCOLAFTER'] = 'Inserir coluna após';
$lang['pt_PT']['HtmlEditorField']['INSERTCOLBEF'] = 'Inserir coluna antes';
$lang['pt_PT']['HtmlEditorField']['INSERTROWAFTER'] = 'Inserir linha depois';
$lang['pt_PT']['HtmlEditorField']['INSERTROWBEF'] = 'Inserir linha antes';
$lang['pt_PT']['HtmlEditorField']['INSERTTABLE'] = 'Inserir tabela';
$lang['pt_PT']['HtmlEditorField']['LINK'] = 'Inserir/editar link no texto seleccionado';
$lang['pt_PT']['HtmlEditorField']['LINKDESCR'] = 'Descrição do link';
$lang['pt_PT']['HtmlEditorField']['LINKEMAIL'] = 'Endereço email';
$lang['pt_PT']['HtmlEditorField']['LINKEXTERNAL'] = 'Outro site';
$lang['pt_PT']['HtmlEditorField']['LINKFILE'] = 'Descarregar ficheiro';
$lang['pt_PT']['HtmlEditorField']['LINKINTERNAL'] = 'Página no site';
$lang['pt_PT']['HtmlEditorField']['LINKOPENNEWWIN'] = 'Abrir link noutra janela?';
$lang['pt_PT']['HtmlEditorField']['LINKTO'] = 'Link para';
$lang['pt_PT']['HtmlEditorField']['OK'] = 'ok';
$lang['pt_PT']['HtmlEditorField']['OL'] = 'Lista ordenada';
$lang['pt_PT']['HtmlEditorField']['OUTDENT'] = 'Diminuir tabulação';
$lang['pt_PT']['HtmlEditorField']['PAGE'] = 'Página';
$lang['pt_PT']['HtmlEditorField']['PASTE'] = 'Colar (Ctrl+V)';
$lang['pt_PT']['HtmlEditorField']['REDO'] = 'Refazer (Ctrl+Y)';
$lang['pt_PT']['HtmlEditorField']['SELECTALL'] = 'Seleccionar Tudo (Ctrl+A)';
$lang['pt_PT']['HtmlEditorField']['UNDO'] = 'Voltar (Ctrl+Z)';
$lang['pt_PT']['HtmlEditorField']['UNLINK'] = 'Remover link';
$lang['pt_PT']['HtmlEditorField']['UPLOAD'] = 'enviar';
$lang['pt_PT']['HtmlEditorField']['URL'] = 'URL';
$lang['pt_PT']['HtmlEditorField']['VISUALAID'] = 'Mostrar/esconder guias';
$lang['pt_PT']['Image']['PLURALNAME'] = 'Ficheiros';
$lang['pt_PT']['Image']['SINGULARNAME'] = 'Ficheiro';
$lang['pt_PT']['ImageField']['NOTEADDIMAGES'] = 'Pode adicionar imagens assim que seja gravado pela primeira vez.';
$lang['pt_PT']['ImageUplaoder']['ONEFROMFILESTORE'] = 'Com uma da área de ficheiros';
$lang['pt_PT']['ImageUploader']['ATTACH'] = 'Anexar %s';
$lang['pt_PT']['ImageUploader']['DELETE'] = 'Apagar %s';
$lang['pt_PT']['ImageUploader']['FROMCOMPUTER'] = 'Do seu computador';
$lang['pt_PT']['ImageUploader']['FROMFILESTORE'] = 'Da área de ficheiros do Site';
$lang['pt_PT']['ImageUploader']['ONEFROMCOMPUTER'] = 'Com uma do seu computador';
$lang['pt_PT']['ImageUploader']['REALLYDELETE'] = 'Deseja mesmo apagar %s?';
$lang['pt_PT']['ImageUploader']['REPLACE'] = 'Substituir %s';
$lang['pt_PT']['Image_iframe.ss']['TITLE'] = 'Iframe de envio de Imagem';
$lang['pt_PT']['LoginAttempt']['PLURALNAME'] = 'Tentativas de login';
$lang['pt_PT']['LoginAttempt']['SINGULARNAME'] = 'Tentativas de login';
$lang['pt_PT']['Member']['ADDRESS'] = 'Morada';
$lang['pt_PT']['Member']['belongs_many_many_Groups'] = 'Grupos';
$lang['pt_PT']['Member']['BUTTONCHANGEPASSWORD'] = 'Alterar Password';
$lang['pt_PT']['Member']['BUTTONLOGIN'] = 'Entrar';
$lang['pt_PT']['Member']['BUTTONLOGINOTHER'] = 'Autenticar-se com outras credenciais';
$lang['pt_PT']['Member']['BUTTONLOSTPASSWORD'] = 'Recuperar Password';
$lang['pt_PT']['Member']['CONFIRMNEWPASSWORD'] = 'Confirmar Nova Password';
$lang['pt_PT']['Member']['CONFIRMPASSWORD'] = 'Confirmar Password';
$lang['pt_PT']['Member']['CONTACTINFO'] = 'Informações de Contacto';
$lang['pt_PT']['Member']['db_LockedOutUntil'] = 'Bloqueado até';
$lang['pt_PT']['Member']['db_PasswordExpiry'] = 'Data de expiração da password';
$lang['pt_PT']['Member']['EMAIL'] = 'Email';
$lang['pt_PT']['Member']['EMAILSIGNUPINTRO1'] = 'Obrigado por se registar e se tornar novo membro, os seus detalhes estão abaixo para referência futura.';
$lang['pt_PT']['Member']['EMAILSIGNUPINTRO2'] = 'Pode efectuar a autenticação no website com as credenciais abaixo';
$lang['pt_PT']['Member']['EMAILSIGNUPSUBJECT'] = 'Obrigado por se registar';
$lang['pt_PT']['Member']['ERRORLOCKEDOUT'] = 'A sua conta foi desactivada temporariamente devido ao número excessivo de tentativas falhadas. Volte a tentar daqui a 20 minutos.';
$lang['pt_PT']['Member']['ERRORNEWPASSWORD'] = 'As passwords novas não coincidem, por favor tente novamente';
$lang['pt_PT']['Member']['ERRORPASSWORDNOTMATCH'] = 'A sua password actual está errada, por favor tente novamente';
$lang['pt_PT']['Member']['ERRORWRONGCRED'] = 'Não aparenta ser o seu email correcto ou password. Por favor tente novamente.';
$lang['pt_PT']['Member']['FIRSTNAME'] = 'Primeiro nome';
$lang['pt_PT']['Member']['GREETING'] = 'Bem vindo';
$lang['pt_PT']['Member']['INTERFACELANG'] = 'Linguagem do Interface';
$lang['pt_PT']['Member']['LOGGEDINAS'] = 'Está autenticado como %s.';
$lang['pt_PT']['Member']['MOBILE'] = 'Telemóvel';
$lang['pt_PT']['Member']['NAME'] = 'Nome';
$lang['pt_PT']['Member']['NEWPASSWORD'] = 'Nova Password';
$lang['pt_PT']['Member']['PASSWORD'] = 'Password';
$lang['pt_PT']['Member']['PASSWORDCHANGED'] = 'A sua password foi alterada e uma copia foi enviada para si por email.';
$lang['pt_PT']['Member']['PERSONALDETAILS'] = 'Detalhes Pessoais';
$lang['pt_PT']['Member']['PHONE'] = 'Telefone';
$lang['pt_PT']['Member']['PLURALNAME'] = 'Membros';
$lang['pt_PT']['Member']['REMEMBERME'] = 'Lembrar-se de mim?';
$lang['pt_PT']['Member']['SINGULARNAME'] = 'Membro';
$lang['pt_PT']['Member']['SUBJECTPASSWORDCHANGED'] = 'A sua password foi alterada';
$lang['pt_PT']['Member']['SUBJECTPASSWORDRESET'] = 'Link para recuperar a password';
$lang['pt_PT']['Member']['SURNAME'] = 'Sobrenome';
$lang['pt_PT']['Member']['USERDETAILS'] = 'Detalhes do Utilizador';
$lang['pt_PT']['Member']['VALIDATIONMEMBEREXISTS'] = 'Já existe um membro com este email';
$lang['pt_PT']['Member']['WELCOMEBACK'] = 'Bem vindo de volta, %s';
$lang['pt_PT']['Member']['YOUROLDPASSWORD'] = 'Password antiga';
$lang['pt_PT']['MemberAuthenticator']['TITLE'] = 'Email e Password';
$lang['pt_PT']['MemberPassword']['PLURALNAME'] = 'Passwords de membros';
$lang['pt_PT']['MemberPassword']['SINGULARNAME'] = 'Password do Membro';
$lang['pt_PT']['NumericField']['VALIDATION'] = '\'%s\' não é um número, apenas números podem ser inseridos neste campo';
$lang['pt_PT']['NumericField']['VALIDATIONJS'] = 'não corresponde a um número, apenas números são aceites para este campo.';
$lang['pt_PT']['Page']['PLURALNAME'] = 'Páginas';
$lang['pt_PT']['Page']['SINGULARNAME'] = 'Página';
$lang['pt_PT']['Permission']['FULLADMINRIGHTS'] = 'Direitos de Administrador';
$lang['pt_PT']['Permission']['PERMSDEFINED'] = 'Estão definidos os seguintes códigos de permissões  ';
$lang['pt_PT']['Permission']['PLURALNAME'] = 'Permissões';
$lang['pt_PT']['Permission']['SINGULARNAME'] = 'Permissão';
$lang['pt_PT']['PhoneNumberField']['VALIDATION'] = 'Por favor insira um número de telefone válido';
$lang['pt_PT']['QueuedEmail']['PLURALNAME'] = 'Emails em Lista de Espera';
$lang['pt_PT']['QueuedEmail']['SINGULARNAME'] = 'Email em Lista de Espera';
$lang['pt_PT']['RedirectorPage']['HASBEENSETUP'] = 'Uma página de redireccionamento foi criada sem nenhum destino.';
$lang['pt_PT']['RedirectorPage']['HEADER'] = 'Esta página irá redireccionar os utilizadores para outra página';
$lang['pt_PT']['RedirectorPage']['OTHERURL'] = 'Outro Site';
$lang['pt_PT']['RedirectorPage']['PLURALNAME'] = 'Páginas de Redirecção';
$lang['pt_PT']['RedirectorPage']['REDIRECTTO'] = 'Redireccionar para';
$lang['pt_PT']['RedirectorPage']['REDIRECTTOEXTERNAL'] = 'Outro site';
$lang['pt_PT']['RedirectorPage']['REDIRECTTOPAGE'] = 'Uma página no seu site';
$lang['pt_PT']['RedirectorPage']['SINGULARNAME'] = 'Página de Redirecção';
$lang['pt_PT']['RedirectorPage']['YOURPAGE'] = 'Página no seu Site';
$lang['pt_PT']['RelationComplexTableField.ss']['ADD'] = 'Adicionar';
$lang['pt_PT']['RelationComplexTableField.ss']['DELETE'] = 'apagar';
$lang['pt_PT']['RelationComplexTableField.ss']['EDIT'] = 'editar';
$lang['pt_PT']['RelationComplexTableField.ss']['NOTFOUND'] = 'Não encontrado';
$lang['pt_PT']['RelationComplexTableField.ss']['SHOW'] = 'mostrar';
$lang['pt_PT']['Security']['ALREADYLOGGEDIN'] = 'Não tem acesso a esta página. Se tem outras credenciais que lhe permitem aceder a esta página, pode-se autenticar abaixo.';
$lang['pt_PT']['Security']['BUTTONSEND'] = 'Enviar o link para recuperar a password';
$lang['pt_PT']['Security']['CHANGEPASSWORDBELOW'] = 'Pode modificar a sua password abaixo.';
$lang['pt_PT']['Security']['CHANGEPASSWORDHEADER'] = 'Mudar a password';
$lang['pt_PT']['Security']['EMAIL'] = 'Email:';
$lang['pt_PT']['Security']['ENCDISABLED1'] = 'Encriptação de Password desactivada.';
$lang['pt_PT']['Security']['ENCDISABLED2'] = 'Para encriptar as password altere ';
$lang['pt_PT']['Security']['ENCRYPT'] = 'A encriptar todas as passwords';
$lang['pt_PT']['Security']['ENCRYPTWITH'] = 'As passwords serão encriptadas utilizando o algoritmo &quot;%s&quot;';
$lang['pt_PT']['Security']['ENTERNEWPASSWORD'] = 'Por favor insira uma nova password.';
$lang['pt_PT']['Security']['ERRORPASSWORDPERMISSION'] = 'Tem de estar autenticado para poder alterar a sua password!';
$lang['pt_PT']['Security']['ID'] = 'ID:';
$lang['pt_PT']['Security']['IPADDRESSES'] = 'Endereço de IP';
$lang['pt_PT']['Security']['LOGGEDOUT'] = 'Terminou a autenticação.  Se se deseja autenticar novamente insira as suas credenciais abaixo.';
$lang['pt_PT']['Security']['LOGIN'] = 'Log in';
$lang['pt_PT']['Security']['LOSTPASSWORDHEADER'] = 'Password Perdida';
$lang['pt_PT']['Security']['NOTEPAGESECURED'] = 'Esta página é privada. Insira as suas credenciais abaixo para a visualizar.';
$lang['pt_PT']['Security']['NOTERESETPASSWORD'] = 'Insira o seu endereço de email, e será enviado um link que poderá utilizar para recuperar a sua password';
$lang['pt_PT']['Security']['NOTHINGTOENCRYPT1'] = 'Não existem passwords para encriptar';
$lang['pt_PT']['Security']['PASSWORDSENTHEADER'] = 'Link de recuperação da password enviado para \'%s\'';
$lang['pt_PT']['Security']['PASSWORDSENTTEXT'] = 'Obrigado!, O link de recuperação da password foi enviado para \'%s\'.';
$lang['pt_PT']['Security']['PERMFAILURE'] = 'Esta página está protegida, para aceder é necessário ter permissões de administrador. Insira os seus dados e será reencaminhado para a página.';
$lang['pt_PT']['SecurityAdmin']['ADVANCEDONLY'] = 'Esta secção é apenas para utilizadores avançados.
Veja <a href="http://doc.silverstripe.com/doku.php?id=permissions:codes" target="_blank">esta página</a> para mais informação.';
$lang['pt_PT']['SecurityAdmin']['CODE'] = 'Código';
$lang['pt_PT']['SecurityAdmin']['OPTIONALID'] = 'ID Opcional';
$lang['pt_PT']['SecurityAdmin']['PERMISSIONS'] = 'Permissões';
$lang['pt_PT']['SecurityAdmin']['VIEWUSER'] = 'Ver Utilizador';
$lang['pt_PT']['SimpleImageField']['NOUPLOAD'] = 'Nenhuma imagem enviada';
$lang['pt_PT']['SiteTree']['ACCESSANYONE'] = 'Todos';
$lang['pt_PT']['SiteTree']['ACCESSHEADER'] = 'Quem pode ver esta página no site?';
$lang['pt_PT']['SiteTree']['ACCESSLOGGEDIN'] = 'Utilizadores Autenticados';
$lang['pt_PT']['SiteTree']['ACCESSONLYTHESE'] = 'Apenas estes (Seleccione da lista abaixo)';
$lang['pt_PT']['SiteTree']['ADDEDTODRAFT'] = 'Adicionada ao site de rascunho';
$lang['pt_PT']['SiteTree']['ALLOWCOMMENTS'] = 'Permitir comentários nesta página?';
$lang['pt_PT']['SiteTree']['APPEARSVIRTUALPAGES'] = 'Este conteúdo também aparece nas páginas virtuais nas secções %s.';
$lang['pt_PT']['SiteTree']['BUTTONCANCELDRAFT'] = 'Cancelar alterações do rascunho';
$lang['pt_PT']['SiteTree']['BUTTONCANCELDRAFTDESC'] = 'Apagar o rascunho e reverter para a página actualmente publicada';
$lang['pt_PT']['SiteTree']['BUTTONSAVEPUBLISH'] = 'Gravar e Publicar';
$lang['pt_PT']['SiteTree']['BUTTONUNPUBLISH'] = 'Remover do site Publicado';
$lang['pt_PT']['SiteTree']['BUTTONUNPUBLISHDESC'] = 'Remover esta página do site publicado';
$lang['pt_PT']['SiteTree']['CHANGETO'] = 'Alterar para %s';
$lang['pt_PT']['SiteTree']['Content'] = 'Conteúdo';
$lang['pt_PT']['SiteTree']['DEFAULTABOUTCONTENT'] = '<p>Pode preencher esta página com o seu próprio conteúdo, ou apagá-la e criar as suas próprias páginas. <br /></p>';
$lang['pt_PT']['SiteTree']['DEFAULTABOUTTITLE'] = 'Quem Somos';
$lang['pt_PT']['SiteTree']['DEFAULTCONTACTCONTENT'] = '<p>Pode preencher esta página com o seu próprio conteúdo, ou apagá-la e criar as suas próprias páginas. <br /></p>';
$lang['pt_PT']['SiteTree']['DEFAULTCONTACTTITLE'] = 'Contacte-nos';
$lang['pt_PT']['SiteTree']['DEFAULTHOMECONTENT'] = '<p>Bem-vido ao SilverStripe! Esta é a página principal. Pode editar esta página acedendo ao <a href="admin/">CMS</a>. Poderá também visitar a <a href="http//doc.silverstripe.com">documentação para desenvolvimento</a>, ou começar <a href="http://doc.silverstripe.com/doku.php?id=tutorials">pelos tutoriais.</a></p>';
$lang['pt_PT']['SiteTree']['DEFAULTHOMETITLE'] = 'Página Principal';
$lang['pt_PT']['SiteTree']['EDITANYONE'] = 'Todos que possam efectuar a autenticação no CMS';
$lang['pt_PT']['SiteTree']['EDITHEADER'] = 'Quem pode editar esta página no CMS?';
$lang['pt_PT']['SiteTree']['EDITONLYTHESE'] = 'Apenas estes (Seleccione da lista abaixo)';
$lang['pt_PT']['SiteTree']['GROUP'] = 'Grupo';
$lang['pt_PT']['SiteTree']['HASBROKENLINKS'] = 'Esta página contém links quebrados.';
$lang['pt_PT']['SiteTree']['has_one_Parent'] = 'Página Parente';
$lang['pt_PT']['SiteTree']['HOMEPAGEFORDOMAIN'] = 'Domínio(s)';
$lang['pt_PT']['SiteTree']['HTMLEDITORTITLE'] = 'Conteúdo';
$lang['pt_PT']['SiteTree']['MENUTITLE'] = 'Nome na Navegação';
$lang['pt_PT']['SiteTree']['METADESC'] = 'Descrição';
$lang['pt_PT']['SiteTree']['METAEXTRA'] = 'Meta-Tags personalizáveis';
$lang['pt_PT']['SiteTree']['METAHEADER'] = 'Meta-Tags para motor de Busca';
$lang['pt_PT']['SiteTree']['METAKEYWORDS'] = 'Palavras chave';
$lang['pt_PT']['SiteTree']['METATITLE'] = 'Título';
$lang['pt_PT']['SiteTree']['MODIFIEDONDRAFT'] = 'Modificada no site de rascunho';
$lang['pt_PT']['SiteTree']['NOBACKLINKS'] = 'Não existe nenhuma página com links para esta.';
$lang['pt_PT']['SiteTree']['NOTEUSEASHOMEPAGE'] = 'Usar esta página como a página pré-definida para os seguintes domínios: 
							(separar múltiplos domínios por vírgulas)';
$lang['pt_PT']['SiteTree']['PAGESLINKING'] = 'A seguintes páginas contêm links para esta página:';
$lang['pt_PT']['SiteTree']['PAGETITLE'] = 'Nome da página';
$lang['pt_PT']['SiteTree']['PAGETYPE'] = 'Tipo de Página';
$lang['pt_PT']['SiteTree']['PLURALNAME'] = 'Árvores do Site';
$lang['pt_PT']['SiteTree']['REMOVEDFROMDRAFT'] = 'Removida do site de rascunho';
$lang['pt_PT']['SiteTree']['SHOWINMENUS'] = 'Mostrar no Menu?';
$lang['pt_PT']['SiteTree']['SHOWINSEARCH'] = 'Mostrar nas pesquisas?';
$lang['pt_PT']['SiteTree']['SINGULARNAME'] = 'Árvore do Site';
$lang['pt_PT']['SiteTree']['TABACCESS'] = 'Acesso';
$lang['pt_PT']['SiteTree']['TABBACKLINKS'] = 'Referências';
$lang['pt_PT']['SiteTree']['TABBEHAVIOUR'] = 'Comportamento';
$lang['pt_PT']['SiteTree']['TABCONTENT'] = 'Conteúdo';
$lang['pt_PT']['SiteTree']['TABMAIN'] = 'Principal';
$lang['pt_PT']['SiteTree']['TABMETA'] = 'Meta-data';
$lang['pt_PT']['SiteTree']['TABREPORTS'] = 'Relatórios';
$lang['pt_PT']['SiteTree']['TOPLEVEL'] = 'Conteúdo do Site (Nível Superior)';
$lang['pt_PT']['SiteTree']['URL'] = 'URL';
$lang['pt_PT']['SiteTree']['URLSegment'] = 'Segmento de URL';
$lang['pt_PT']['SiteTree']['VALIDATIONURLSEGMENT1'] = 'Outra página já está a utilizar este URL. O URL deve ser único para cada página';
$lang['pt_PT']['SiteTree']['VALIDATIONURLSEGMENT2'] = 'URL\'s só podem conter letras, dígitos e hífens.';
$lang['pt_PT']['TableField']['ISREQUIRED'] = 'No %s \'%s\' é obrigatório.';
$lang['pt_PT']['TableField.ss']['ADD'] = 'Adicionar nova linha';
$lang['pt_PT']['TableField.ss']['CSVEXPORT'] = 'Exportar para CSV';
$lang['pt_PT']['TableListField']['CSVEXPORT'] = 'Exportar para CSV';
$lang['pt_PT']['TableListField']['PRINT'] = 'Imprimir';
$lang['pt_PT']['TableListField_PageControls.ss']['VIEWFIRST'] = 'Ver o primeiro';
$lang['pt_PT']['TableListField_PageControls.ss']['VIEWLAST'] = 'Ver o último';
$lang['pt_PT']['TableListField_PageControls.ss']['VIEWNEXT'] = 'Ver o próximo';
$lang['pt_PT']['TableListField_PageControls.ss']['VIEWPREVIOUS'] = 'Ver o anterior';
$lang['pt_PT']['ToggleCompositeField.ss']['HIDE'] = 'Esconder';
$lang['pt_PT']['ToggleCompositeField.ss']['SHOW'] = 'Mostrar';
$lang['pt_PT']['ToggleField']['LESS'] = 'menos';
$lang['pt_PT']['ToggleField']['MORE'] = 'mais';
$lang['pt_PT']['Translatable']['CREATE'] = 'Criar nova tradução';
$lang['pt_PT']['Translatable']['CREATEBUTTON'] = 'Criar';
$lang['pt_PT']['Translatable']['EXISTING'] = 'Traduções existentes:';
$lang['pt_PT']['Translatable']['NEWLANGUAGE'] = 'Novo idioma';
$lang['pt_PT']['Translatable']['TRANSLATIONS'] = 'Traduções';
$lang['pt_PT']['TreeSelectorField']['CANCEL'] = 'cancelar';
$lang['pt_PT']['TreeSelectorField']['SAVE'] = 'gravar';
$lang['pt_PT']['TypeDropdown']['NONE'] = 'Nenhum';
$lang['pt_PT']['Versioned']['has_many_Versions'] = 'Versões';
$lang['pt_PT']['VirtualPage']['CHOOSE'] = 'Escolha uma página para onde redireccionar';
$lang['pt_PT']['VirtualPage']['EDITCONTENT'] = 'clique aqui para editar o conteúdo';
$lang['pt_PT']['VirtualPage']['HEADER'] = 'Esta é uma página virtual';
$lang['pt_PT']['VirtualPage']['PLURALNAME'] = 'Páginas Virtuais';
$lang['pt_PT']['VirtualPage']['SINGULARNAME'] = 'Página Virtual';
$lang['pt_PT']['Widget']['PLURALNAME'] = 'Widgets';
$lang['pt_PT']['Widget']['SINGULARNAME'] = 'Widget';
$lang['pt_PT']['WidgetArea']['PLURALNAME'] = 'Áreas de Widget';
$lang['pt_PT']['WidgetArea']['SINGULARNAME'] = 'Área de Widget';

?>