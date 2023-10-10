<?php
function sortData($data, $sortKey, $descending = false) {
    usort($data, function($a, $b) use ($sortKey, $descending) {
        $result = strcmp($a[$sortKey], $b[$sortKey]);
        return $descending ? -$result : $result;
    });
    return $data;
}

session_start();
if (!isset($_SESSION['sortOrder'])) {
    $_SESSION['sortOrder'] = 'asc';
}

if (isset($_GET['sort']) && $_GET['sort'] == 'name') {
    if (isset($_GET['order']) && ($_GET['order'] == 'asc' || $_GET['order'] == 'desc')) {
        $order = $_GET['order'];
        $_SESSION['sortOrder'] = $order;
        $data = sortData($data, 'name', ($order == 'desc'));
    } else {
        $data = sortData($data, 'name', ($_SESSION['sortOrder'] == 'desc'));
    }
}

$toggleOrder = ($_SESSION['sortOrder'] == 'asc') ? 'desc' : 'asc';
$orderLabel = ($_SESSION['sortOrder'] == 'asc') ? 'alphabétique' : 'désalphabétique';
?>
<div class='flex gap-2 items-center'>
<?php
echo "<p class='mx-4 my-2 px-3 py-2 border-black border-2'><a href=\"./?page=accueil&layout=html&sort=name&order=$toggleOrder\">Ordre $orderLabel</a></p>";
if (isset($_GET['sort']))
echo  '<a href="./?page=accueil&layout=html"><i class="fa-solid fa-xmark mt-2"></i></a>';

?>
</div>