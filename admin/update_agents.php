<?php
// Activer l'affichage des erreurs PHP
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Inclure les fichiers header et sidebar
include 'includes/header.php';
include 'includes/sidebar.php';

// Inclure la connexion à la base de données
include '../includes/db.php';

// Récupérer les catégories pour le formulaire
$sql = "SELECT * FROM categories";
$result = $conn->query($sql);
$categories = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $categories[] = $row;
    }
}
?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Ajouter un Produit</h1>
    </div>
    <form action="save_product.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="name">Nom du produit</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="category">Catégorie</label>
            <select class="form-control" id="category" name="category_id" required>
                <?php foreach ($categories as $category): ?>
                    <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
		<div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description" rows="2" required></textarea>
        </div>
        <div class="form-group">
            <label for="characteristics">Caractéristiques</label>
            <textarea class="form-control" id="characteristics" name="characteristics" rows="5" required></textarea>
        </div>
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" class="form-control-file" id="image" name="image" required>
        </div>
        <button type="submit" class="btn btn-primary">Ajouter</button>
    </form>
</main>
<?php include 'includes/footer.php'; ?>
