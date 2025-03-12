<?php
/**
 * Renders the starting HTML structure for email templates
 * 
 * @param string $title The title of the email
 * @return string HTML markup for the beginning of the email document
 */
function renderDocumentStart($title) {
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
<body style="margin: 0; padding: 0; font-family: \'Open Sans\', Arial, sans-serif; background: #f8f8f8;">
  <div class="body-wrapper" style="max-width: 600px; margin: 100px auto; background: white; font-family: \'Open Sans\', Arial, sans-serif;">';
}

/**
 * Renders the closing HTML structure for email templates
 * 
 * @return string HTML markup for the end of the email document
 */
function renderDocumentEnd() {
    return '
  </div>
</body>
</html>';
}
?>

