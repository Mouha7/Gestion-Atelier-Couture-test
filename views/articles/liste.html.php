<div class="color-indigo d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Liste d'articles</h1>
</div>
<div class="color-indigo">
    <div class="card w-full mb-3">
        <div class="card-body d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center justify-content-center">
                <label for="categorie" class="form-label mr-3 mb-0">Catégorie</label>
                <select class="form-select" aria-label="Default select example" id="categorie">
                    <option selected></option>
                    <?php foreach($categorie_array as $categorie):?>
                        <option value="<?=$categorie["idCategorie"]?>"><?=$categorie["nomCategorie"]?></option>
                    <?php endforeach?>
                </select>
            </div>
            <div class="d-flex align-items-center justify-content-center">
                <label for="type" class="form-label mr-3 mb-0">Type</label>
                <select class="form-select" aria-label="Default select example" id="type">
                    <option selected></option>
                    <?php foreach($type_array as $type):?>
                        <option value="<?=$type["idType"]?>"><?=$type["nomType"]?></option>
                    <?php endforeach?>
                </select>
            </div>
            <a href="<?=WEBROOT?>?controller=article&action=form-new-article" class="btn color-honeydew background-color-indigo">Nouveau</a>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table background-color-white color-indigo">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Libelle</th>
                    <th scope="col">Prix</th>
                    <th scope="col">Quantité Stock</th>
                    <th scope="col">Catégorie</th>
                    <th scope="col">Type</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $counter = 0;?>
                <?php foreach ($articles_array as $article) : ?>
                    <?php $counter++;?>
                    <tr class="">
                        <td scope="row"><?= $counter ?></td>
                        <td scope="row"><?= $article["libelle"] ?></td>
                        <td scope="row"><?= $article["prixAppro"] ?></td>
                        <td scope="row"><?= $article["qteStock"] ?></td>
                        <td scope="row"><?= $article["nomCategorie"] ?></td>
                        <td scope="row"><?= $article["nomType"] ?></td>
                        <td scope="row">
                            <form action="post" method="<?=WEBROOT?>">
                                <a href="<?=WEBROOT?>?controller=article&action=detail-article&idArticle=<?=$article["idArticle"]?>" class="btn background-color-sunglow">Modifier</a>
                                <input type="hidden" name="action" value="delete-article">
                                <input type="hidden" name="controller" value="article">
                                <button type="submit" class="btn background-color-red" name="idArticle" value="<?=$article["idArticle"]?>">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>