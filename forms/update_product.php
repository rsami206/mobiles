<?php
// database connection
require("../includes/connection.php");
// header links
require("../includes/header.php");
// get data 
$id = $_GET['id'];
// select querry from porducts
$select_q = "SELECT * FROM products WHERE id=$id";
// run the querry
$result=mysqli_query($conect,$select_q);
// make empty variable
$data=null;
// give data form results  as asscotated reeay and chech how many ropw are in resluts
if(mysqli_num_rows($result) <=0 ){
    die("no data founds");
}else{
    $data = mysqli_fetch_assoc($result);
}
?>

<style>
    </style>
    <div class="container mt-5">
        <div class="card p-4">
            <h2 class="mb-4 m-auto">Product Form</h2>
            <form action="../actions/update_product_action.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $id ?>" />
                <div class="mb-3">
                    <label class="form-label required-label">Name</label>
                    <input type="text" name="name" value="<?php echo $data['name'] ?>" class="form-control" required autocomplete="off">
                </div>
                
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label required-label">Price</label>
                        <input type="number" value="<?php echo $data['price'] ?>" name="price" class="form-control" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label required-label">Discount Price</label>
                        <input type="number" value="<?php echo $data['discount_price'] ?>" name="discount_price" class="form-control" required>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label required-label">RAM</label>
                        <select name="ram" class="form-select" required>
                            <option value="">Select RAM</option>
                            <option value="2GB" <?php if($data['ram'] == '2GB'){echo "selected";} ?> >2GB</option>
                            <option value="3GB" <?php if($data['ram'] == '3GB'){echo "selected";} ?>>3GB</option>
                            <option value="4GB" <?php if($data['ram'] == '4GB'){echo "selected";} ?>>4GB</option>
                            <option value="6GB" <?php if($data['ram'] == '6GB'){echo "selected";} ?>>6GB</option>
                            <option value="8GB" <?php if($data['ram'] == '8GB'){echo "selected";} ?>>8GB</option>
                            <option value="12GB" <?php if($data['ram'] == '12GB'){echo "selected";} ?>>12GB</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label required-label">Storage</label>
                        <select name="storage" class="form-select" required>
                            <option value="">Select Storage</option>
                            <option value="16GB" <?php if($data['storage'] == '16GB'){echo "selected";} ?>>16GB</option>
                            <option value="32GB" <?php if($data['storage'] == '32GB'){echo "selected";} ?>>32GB</option>
                            <option value="64GB" <?php if($data['storage'] == '64GB'){echo "selected";} ?>>64GB</option>
                            <option value="128GB" <?php if($data['storage'] == '128GB'){echo "selected";} ?>>128GB</option>
                            <option value="256GB" <?php if($data['storage'] == '256GB'){echo "selected";} ?>>256GB</option>
                        </select>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label required-label">Screen Size</label>
                        <select name="screen_size" class="form-select" required>
                            <option value="">Select Screen Size</option>
                            <option value="50MP" <?php if($data['screen_size'] == '50MP'){echo "selected";} ?> >50MP</option>
                            <option value="60MP" <?php if($data['screen_size'] == '60MP'){echo "selected";} ?>>60MP</option>
                            <option value="80MP" <?php if($data['screen_size'] == '80MP'){echo "selected";} ?>>80MP</option>
                            <option value="40MP" <?php if($data['screen_size'] == '40MP'){echo "selected";} ?>>40MP</option>
                            <option value="70MP" <?php if($data['screen_size'] == '70MP'){echo "selected";} ?>>70MP</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label required-label">Brand</label>
                        <select name="brand" class="form-select" required>
                            <option value="">Select Brand</option>
                            <option value="Samsung" <?php if($data['brand'] == 'Samsung'){echo "selected";} ?>>Samsung</option>
                            <option value="Vivo" <?php if($data['brand'] == 'Vivo'){echo "selected";} ?> >Vivo</option>
                            <option value="Oppo" <?php if($data['brand'] == 'Oppo'){echo "selected";} ?>>Oppo</option>
                            <option value="Infinix" <?php if($data['brand'] == 'Infinix'){echo "selected";} ?>>Infinix</option>
                            <option value="iPhone" <?php if($data['brand'] == 'iphone'){echo "selected";} ?>>iPhone</option>
                        </select>
                    </div>
                </div>
                
                <div class="mb-3">
                    <label class="form-label required-label">Model</label>
                    <select name="model" class="form-select" required>
                        <option value="">Select Model</option>
                        <option value="V12" <?php if($data['model'] == 'V12'){echo "selected";} ?>>V12</option>
                        <option value="V20" <?php if($data['model'] == 'V20'){echo "selected";} ?>>V20</option>
                        <option value="V21" <?php if($data['model'] == 'V21'){echo "selected";} ?>>V21</option>
                        <option value="I5" <?php if($data['model'] == 'I5'){echo "selected";} ?>>I5</option>
                        <option value="I6" <?php if($data['model'] == 'I6'){echo "selected";} ?>>I6</option>
                        <option value="I12" <?php if($data['model'] == 'I12'){echo "selected";} ?>>I12</option>
                        <option value="I12 Pro" <?php if($data['model'] == 'I12 pro'){echo "selected";} ?>>I12 Pro</option>
                        <option value="Galaxy S" <?php if($data['model'] == 'Galaxy S'){echo "selected";} ?>>Galaxy S</option>
                        <option value="Galaxy Z" <?php if($data['model'] == 'Galaxy Z'){echo "selected";} ?>>Galaxy Z</option>
                        <option value="Oppo S1" <?php if($data['model'] == 'Oppo S1'){echo "selected";} ?>>Oppo S1</option>
                        <option value="A37" <?php if($data['model'] == 'A37'){echo "selected";} ?>>A37</option>
                    </select>
                </div>
                
                <div class="mb-3">
                    <label class="form-label required-label">Upload Image</label>
                    <input type="file" name="image" value="<?= $data['image_name'] ?>" class="form-control"  accept="images/*">
                </div>
                
                <div class="mb-3">
                    <label class="form-label required-label">Description</label>
                    <textarea name="description" class="form-control" rows="4" required></textarea>
                </div>
                
                <button type="submit" class="btn btn-primary w-100">Submit</button>
            </form>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
