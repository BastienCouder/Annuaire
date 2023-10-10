<div class='px-2 flex flex-col lg:flex-row'>
    <div>
<?php
include './templates/components/sort.php';
include './templates/components/filter.php';
?>
</div>

<?php
function getSpecialiteClass($specialite) {
    switch ($specialite) {
        case 'Communication graphique':
            return 'px-3 py-2 border-2 border-blue-500';
        case 'Communication digitale':
            return 'px-3 py-2 border-2 border-violet-700';
        case 'Développement web':
            return 'px-3 py-2 border-2 border-yellow-500';
        case 'Marketing digital':
            return 'px-3 py-2 border-2 border-red-800';
        default:
            return 'px-3 py-2 border-2 border-black';
    }
}

function getYearClass($year) {
    switch ($year) {
        case 'A1':
            return 'px-3 py-2 border-2 border-green-700';
        case 'A2':
            return 'px-3 py-2 border-2 border-green-800';
        case 'A3':
            return 'px-3 py-2 border-2 border-green-900';
        case 'M1':
            return 'px-3 py-2 border-2 border-orange-800';
        case 'M2':
            return 'px-3 py-2 border-2 border-orange-900';
        default:
            return 'px-3 py-2 border-2 border-black';
    }
}

if (!empty($selectedFiltered)) {
    if (!empty($filtered)) {
        echo "<ul class='py-8 flex flex-col gap-8 mr-4 mb-8'>";
        foreach ($filtered as $item) {
            $specialiteClass = getSpecialiteClass($item['specialite']);
            $yearClass = getYearClass($item['year']);
            ?>
            <li class='px-3 w-full flex flex-col space-y-4 p-4 border-2 border-black lg:w-[40rem]'>
                <div class='flex gap-4 font-bold capitalize items-center text-2xl'>
                    <h2><?= $item['name'] ?></h2>
                    <h2><?= $item['surname'] ?></h2>
                </div>
                <div class='flex items-center gap-4'>
                    <p class='<?= $specialiteClass ?>'><?= $item['specialite'] ?></p>
                    <p class='<?= $yearClass ?>'><?= $item['year'] ?></p>
                </div>
                <div class='flex flex-col lg:flex-row gap-x-12 gap-y-2'>
                    <p class=''><i class='fa-solid fa-envelope mr-4'></i><?= $item['email'] ?></p>
                    <p class=''><i class='fa-solid fa-phone mr-4'></i><?= $item['tel'] ?></p>
                </div>
            </li>
            <?php
        }
        echo "</ul>";
    } else {
        echo "<h2 class='px-3 pt-4'>Aucun résultat trouvé.</h2>";
    }
} elseif (!empty($data)) {
    echo "<ul class='py-8 flex flex-col gap-8 mr-4 mb-8'>";
    foreach ($data as $item) {
        $specialiteClass = getSpecialiteClass($item['specialite']);
        $yearClass = getYearClass($item['year']);
        ?>
        <li class='ml-2 w-full flex flex-col space-y-4 p-4 border-2 border-black lg:w-[40rem]'>
            <div class='flex gap-4 font-bold capitalize items-center text-2xl'>
                <h2><?= $item['name'] ?></h2>
                <h2><?= $item['surname'] ?></h2>
            </div>
            <div class='flex items-center gap-4'>
                <p class='<?= $specialiteClass ?>'><?= $item['specialite'] ?></p>
                <p class='<?= $yearClass ?>'><?= $item['year'] ?></p>
            </div>
            <div class='flex flex-col lg:flex-row gap-x-12 gap-y-2'>
                <p class=''><i class='fa-solid fa-envelope mr-4'></i><?= $item['email'] ?></p>
                <p class=''><i class='fa-solid fa-phone mr-4'></i><?= $item['tel'] ?></p>
            </div>
        </li>
        <?php
    }
    echo "</ul>";
} else {
    echo "<h2 class='px-3 pt-4'>Aucun résultat trouvé.</h2>";
} 
?>
</div>