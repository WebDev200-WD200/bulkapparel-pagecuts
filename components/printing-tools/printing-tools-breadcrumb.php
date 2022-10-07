<?php 
$breadcrumb = [
    [
    'name'=> 'Home',
    'href'=> '/'
    ]
];

function addBreadcrumbItem($item) {
    global $breadcrumb;
    array_push($breadcrumb, [
        'name' => $item['name'],
        'href' => generatePrintingUrl($item['slug'])
    ]);
}

if(isset($current_page)) {
    if(isset($current_page_parent) && $current_page_parent['slug'] !== $current_page['slug']) {
        addBreadcrumbItem($current_page_parent);
    } 
    addBreadcrumbItem($current_page);
}
?>

<div class="printing-tools-breadcrumb">
    <ul>
        <?php foreach($breadcrumb as $item): ?>
            <li>
                <a href="<?=$item['href']?>"><?=$item['name']?></a>
            </li>
        <?php endforeach ?>
    </ul>
</div>