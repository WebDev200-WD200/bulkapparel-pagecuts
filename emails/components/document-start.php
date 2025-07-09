<?php
/**
 * Renders the starting HTML structure for email templates
 * 
 * @param string $title The title of the email
 * @param string $previewText The preview text to show in email clients
 * @return string HTML markup for the beginning of the email document
 */
function renderDocumentStart($title, $previewText = '') {
    $previewTextHtml = '';
    if (!empty($previewText)) {
        $previewTextHtml = '<div style="display: none; max-height: 0px; overflow: hidden;">
            ' . $previewText . '
            &nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;
            &nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;
            &nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;
        </div>';
    }
    return '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>' . $title . '</title>
  <!--[if !mso]><!-->
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
  <style type="text/css">
    @import url(\'https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap\');
  </style>
  <!--<![endif]-->
  
  <!--[if mso]>
  <style type="text/css">
    .fallback-font {
      font-family: Arial, sans-serif !important;
    }
  </style>
  <![endif]-->
</head>
<body style="margin: 0; padding: 0; background-color: #f8f8f8;font-family: \'Open Sans\', Arial, sans-serif;"> 
'.$previewTextHtml.'
<table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#f8f8f8">
<tr>
<td align="center" valign="top" style="padding: 100px 0;">
<table class="body-wrapper" border="0" cellpadding="0" cellspacing="0" bgcolor="#ffffff" style="min-width:600px; width: 600px; max-width: 600px;">
<tr>
<td>
';
}

/**
 * Renders the closing HTML structure for email templates
 * 
 * @return string HTML markup for the end of the email document
 */
function renderDocumentEnd() {
    return '
</td>
</tr>
</table>
</td>
</tr>
</table>
</body>
</html>';
}
?>

