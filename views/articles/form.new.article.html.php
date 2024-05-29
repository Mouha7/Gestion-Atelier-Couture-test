<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Création Nouveau Article</h1>
</div>
<div class="w-full d-flex justify-content-center align-items-center mt-4">
    <form action="#" class="w-75">
        <div class="mb-3">
            <label for="libelle" class="form-label">Libelle</label>
            <input type="text" class="form-control" id="libelle">
        </div>
        <div class="mb-3">
            <label for="prix" class="form-label">Prix</label>
            <input type="number" class="form-control" id="prix" placeholder="XXXX">
        </div>
        <div class="mb-3">
            <label for="qte" class="form-label">Quantité en Stock</label>
            <input type="number" class="form-control" id="qte" placeholder="XXXX">
        </div>
        <div class="mb-3">
            <label for="prix" class="form-label">Prix</label>
            <input type="number" class="form-control" id="prix" placeholder="XXXX">
        </div>
        <div class="mb-3 d-flex mt-3" style="gap: 20px;">
            <div class="d-flex align-items-center" style="gap: 20px;">
                <label for="type" class="form-label mb-0">Type</label>
                <select class="form-control" aria-label="Default select example" id="type">
                    <option selected></option>
                    <?php foreach ($type_array as $type) : ?>
                        <option value="<?= $type["id"] ?>"><?= $type["nomType"] ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="d-flex align-items-center" style="gap: 20px;">
                <label for="cat" class="form-label mb-0">Catégorie</label>
                <select class="form-control" aria-label="Default select example" id="cat">
                    <option selected></option>
                    <?php foreach ($categorie_array as $categorie) : ?>
                        <option value="<?= $categorie["id"] ?>"><?= $categorie["nomCategorie"] ?></option>
                    <?php endforeach ?>
                </select>
            </div>
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary mb-3">Créer</button>
        </div>
    </form>
</div>