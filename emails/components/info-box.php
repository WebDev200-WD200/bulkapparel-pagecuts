<?php
/**
 * Renders a standardized information box with title and content
 * 
 * @param string $title The title of the box (can be HTML)
 * @param string $content The content of the box (can be HTML)
 * @param string $width Optional width for the container (e.g., "50%")
 * @return string The rendered HTML
 */
function renderInfoBox($title, $content, $width = null) {
    $widthStyle = $width ? ' width="' . $width . '"' : '';
    
    return '
    <td' . $widthStyle . ' valign="top" style="padding: 10px 0;">
        <div class="section-title" style="font-weight: bold; color: #002868; margin-bottom: 10px; border-bottom: 1px solid #eee; padding-bottom: 5px;">' . $title . '</div>
        <p style="margin: 0;">' . $content . '</p>
    </td>';
}

/**
 * Renders a row of info boxes
 * 
 * @param array $boxes Array of boxes, each with 'title' and 'content'
 * @return string The rendered HTML
 */
function renderInfoBoxRow($boxes, $column = 2) {
	$width = floor(100 / $column) . '%';
	$html = '
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
		<tr>
			<td style="padding: 0 20px;">
				<table width="100%" border="0" cellspacing="0" cellpadding="0">';
	
	$boxCount = count($boxes);
	for ($i = 0; $i < $boxCount; $i++) {
		if ($i % $column == 0) {
			if ($i > 0) {
				$html .= '</tr>';
			}
			$html .= '<tr>';
		}
		$html .= renderInfoBox($boxes[$i]['title'], $boxes[$i]['content'], $width);
	}
	
	$html .= '
					</tr>
				</table>
			</td>
		</tr>
	</table>';
	
	return $html;
}
?>

