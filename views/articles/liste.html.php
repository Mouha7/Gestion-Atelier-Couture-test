<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Liste d'articles</h1>
</div>
<div>
    <div class="card w-full mb-3">
        <div class="card-body d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center justify-content-center">
                <label for="categorie" class="form-label mr-3 mb-0">Catégorie</label>
                <select class="form-select" aria-label="Default select example" id="categorie">
                    <option selected></option>
                    <?php foreach($categorie_array as $categorie):?>
                        <option value="<?=$categorie["id"]?>"><?=$categorie["nomCategorie"]?></option>
                    <?php endforeach?>
                </select>
            </div>
            <div class="d-flex align-items-center justify-content-center">
                <label for="type" class="form-label mr-3 mb-0">Type</label>
                <select class="form-select" aria-label="Default select example" id="type">
                    <option selected></option>
                    <?php foreach($type_array as $type):?>
                        <option value="<?=$type["id"]?>"><?=$type["nomType"]?></option>
                    <?php endforeach?>
                </select>
            </div>
            <a href="<?=WEBROOT?>?action=form-new-article" class="btn btn-primary">Nouveau</a>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-primary">
            <thead>
                <tr>
                    <th scope="col">Libelle</th>
                    <th scope="col">Prix</th>
                    <th scope="col">Quantité Stock</th>
                    <th scope="col">Catégorie</th>
                    <th scope="col">Type</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($articles_array as $article) : ?>
                    <tr class="">
                        <td scope="row"><?= $article["libelle"] ?></td>
                        <td scope="row"><?= $article["prixAppro"] ?></td>
                        <td scope="row"><?= $article["qteStock"] ?></td>
                        <td scope="row"><?= $article["nomCategorie"] ?></td>
                        <td scope="row"><?= $article["nomType"] ?></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>