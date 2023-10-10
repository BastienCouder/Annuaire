<ul class="py-5 mx-5">
    <?php
    require_once './src/crud.php';
    $data = read('contacts');

    if (isset($_POST['deleteContact'])) {
        $idToDelete = $_POST['id'];
        $tableName = 'contacts';
        try {
            delete($tableName, $idToDelete);
            $data = read('contacts');
        } catch (Exception $e) {
            echo "Erreur : " . $e->getMessage();
        }
    }

   
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['updateContact'])) {
        $idToUpdate = $_POST['id'];
        $newName = $_POST['newName'];
        $newSurname = $_POST['newSurname'];
        $newEmail = $_POST['newEmail'];
        $newTel = $_POST['newTel'];
        $newYear = $_POST['newYear'];
        $newSpecialite = $_POST['newSpecialite'];
    
        $tableName = 'contacts';
        try {
            update($tableName, $idToUpdate, [
                'name' => $newName,
                'surname' => $newSurname,
                'email' => $newEmail,
                'tel' => $newTel,
                'year' => $newYear,
                'specialite' => $newSpecialite
            ]);
    
            $data = read('contacts');
        } catch (Exception $e) {
            echo "Erreur lors de la mise à jour : " . $e->getMessage();
        }
    }
    ?>
    <table class="w-full border-2 border-black">
        <thead>
            <tr class="border-b border-black flex justify-start px-9">
                <th class="flex justify-start w-[8rem] p-2">Nom</th>
                <th class="flex justify-start  w-[8rem] p-2">Prenom</th>
                <th class="flex justify-start  w-[20rem] p-2">Email</th>
                <th class="flex justify-start  w-[8rem] p-2">Telephone</th>
                <th class="flex justify-start  w-[8rem] p-2">Promo</th>
                <th class="flex justify-start  w-[16rem] p-2">Spécialité</th>
                <th class="flex justify-start  w-[8rem] p-2">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($data as $index => $item) {
                $isEditing = isset($_POST['editContact_' . $item['id']]);
            ?>
        <?php if ($isEditing) { ?>
    <tr class="border-b border-black flex justify-start items-center px-9 gap-4">
        <form method="post" action="" class="flex gap-4">
            <input type="hidden" name="id" value="<?= $item["id"] ?>">
            <td class="w-[7rem] p-2"><input class="border-2 border-black w-full" type="text" name="newSurname" value="<?= $item["surname"] ?>"></td>
            <td class="w-[7rem] p-2"><input class="border-2 border-black w-full" type="text" name="newName" value="<?= $item["name"] ?>"></td>
            <td class="w-[19rem] p-2"><input class="border-2 border-black w-full" type="text" name="newEmail" value="<?= $item["email"] ?>"></td>
            <td class="w-[7rem] p-2"><input class="border-2 border-black w-full" type="text" name="newTel" value="<?= $item["tel"] ?>"></td>
            <td class="w-[7rem] p-2">  
                <select class="border-2 border-black w-full" name="newYear">
                    <option value="A1" <?= ($item["year"] === "A1") ? "selected" : "" ?>>Année 1</option>
                    <option value="A2" <?= ($item["year"] === "A2") ? "selected" : "" ?>>Année 2</option>
                    <option value="A3" <?= ($item["year"] === "A3") ? "selected" : "" ?>>Année 3</option>
                    <option value="M1" <?= ($item["year"] === "M1") ? "selected" : "" ?>>Master 1</option>
                    <option value="M2" <?= ($item["year"] === "M2") ? "selected" : "" ?>>Master 2</option>
                </select>
            </td>
            <td class="w-[16rem] p-2">
                <select class="border-2 border-black w-full" name="newSpecialite">
                    <option value="Tronc commun" <?= ($item["specialite"] === "Tronc commun") ? "selected" : "" ?>>Tronc commun</option>
                    <option value="Communication digitale" <?= ($item["specialite"] === "Communication digitale") ? "selected" : "" ?>>Communication digitale</option>
                    <option value="Communication graphique" <?= ($item["specialite"] === "Communication graphique") ? "selected" : "" ?>>Communication graphique</option>
                    <option value="Développement web" <?= ($item["specialite"] === "Développement web") ? "selected" : "" ?>>Développement web</option>
                    <option value="Marketing digital" <?= ($item["specialite"] === "Marketing digital") ? "selected" : "" ?>>Marketing digital</option>
                </select>
            </td>
            <td class="w-[7rem] p-2">
                <button type="submit" name="updateContact" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-700">Enregistrer</button>
            </td>
        </form>
    </tr>
            <?php } else { ?>
                <tr class="border-b border-black flex justify-start items-center px-9">
                    <td class="w-[8rem] p-2"><?= $item["surname"] ?></td>
                    <td class="w-[8rem] p-2"><?= $item["name"] ?></td>
                    <td class="w-[20rem] p-2"><?= $item["email"] ?></td>
                    <td class="w-[8rem] p-2"><?= $item["tel"] ?></td>
                    <td class="w-[8rem] p-2"><?= $item["year"] ?></td>
                    <td class="w-[16rem] p-2"><?= $item["specialite"] ?></td>
                    <td class="w-[14rem] p-2">
                        <div class='flex gap-4'>
                            <form method="post" action="">
                                <input type="hidden" name="id" value="<?= $item["id"] ?>">
                                <button type="submit" name="deleteContact" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-700">Supprimer</button>
                            </form>
                            <form method="post" action="">
                                <input type="hidden" name="id" value="<?= $item["id"] ?>">
                                <button type="submit" name="editContact_<?= $item['id'] ?>" class="bg-blue-500 text-white px-4 py-2 rounded hover-bg-blue-700">Modifier</button>
                            </form>
                        </div>
                    </td>
                </tr>
            <?php } ?>
            <?php
            }
            ?>
        </tbody>
    </table>
</ul>
