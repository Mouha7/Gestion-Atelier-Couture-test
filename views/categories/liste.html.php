<div class="color-indigo d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Liste des Catégories d'Article</h1>
</div>
<div class="color-indigo">
    <div class="card w-full mb-3">
        <div class="w-full card-body d-flex justify-content-between align-items-center">
            <form method="post" action="<?=WEBROOT?>">
                <div class="w-full d-flex justify-content-between align-items-center">
                    <label for="type" class="form-label">Catégorie</label>
                    <input type="text" class="form-control ml-2" name="nomCategorie" id="type" />
                    <input type="hidden" name="action" value="save-categorie">
                    <input type="hidden" name="controller" value="categorie">
                    <button type="submit" value="btnSave" class="btn color-honeydew background-color-indigo ml-4">Créer</button>
                </div>
            </form>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table background-color-white color-indigo">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $counter = 0;?>
                <?php foreach ($categorie_array as $value) : ?>
                    <?php $counter++?>
                    <tr class="">
                        <td scope="row"><?= $counter ?></td>
                        <td scope="row"><?= $value["nomCategorie"] ?></td>
                        <td scope="row">
                            <form action="post" method="<?=WEBROOT?>">
                                <a href="<?=WEBROOT?>?controller=categorie&action=detail-categorie&idCategorie=<?=$value["idCategorie"]?>" class="btn background-color-sunglow">Modifier</a>
                                <input type="hidden" name="action" value="delete-categorie">
                                <input type="hidden" name="controller" value="categorie">
                                <button type="submit" class="btn background-color-red" name="idCategorie" value="<?=$value["idCategorie"]?>">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>