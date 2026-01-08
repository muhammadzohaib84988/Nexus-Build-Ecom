<?php
// Directory containing images (Updated to zohaib project with relative path)
$imageDirectory = 'imgs/Peripherals';

// Check if directory exists before scanning
if (is_dir($imageDirectory)) {
    $imageFiles = array_diff(scandir($imageDirectory), array('.', '..'));
} else {
    $imageFiles = array();
}

// Generate random prices function
function generateRandomPrice($min = 10000, $max = 50000) {
    return 'Rs ' . rand($min, $max);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('Source/Nav/link.php'); ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nexus Build - Custom Peripherals</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            color: #fff;
            background-color: #0a0b1e;
            margin: 0;
            padding: 0;
        }

        h1 {
            font-size: 3rem;
            color: #e53637;
            text-align: center;
            margin: 30px 0;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }

        h1 span {
            color: #ffaa00;
            font-size: 3.5rem;
        }

        .custom-header {
            text-align: center;
            margin: 20px 0;
        }

        .custom-header button {
            background-color: green;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        .custom-header button:hover {
            background-color: darkgreen;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .product-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
            padding: 20px;
        }

        .product-card {
            background: linear-gradient(145deg, #1f203e, #27284b);
            border-radius: 15px;
            box-shadow: 10px 10px 20px #0a0b1e, -10px -10px 20px #2a2b52;
            text-align: center;
            padding: 20px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .product-card:hover {
            transform: translateY(-10px);
            box-shadow: 15px 15px 30px #0a0b1e, -15px -15px 30px #2a2b52;
        }

        .product-card img {
            max-height: 180px;
            width: 100%;
            object-fit: cover;
            margin-bottom: 15px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.5);
        }

        .product-card .card-title {
            font-size: 1.2rem;
            margin-bottom: 10px;
            color: #ffaa00;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);
        }

        .product-card .price {
            font-size: 1.5rem;
            font-weight: bold;
            margin: 15px 0;
            color: #e53637;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);
        }

        .product-card .btn-custom {
            background: linear-gradient(145deg, #e53637, #ff444f);
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 30px;
            font-size: 1rem;
            font-weight: bold;
            transition: background 0.3s ease;
            cursor: pointer;
            box-shadow: 0 5px 10px rgba(229, 54, 55, 0.4);
        }

        .product-card .btn-custom:hover {
            background: linear-gradient(145deg, #ffaa00, #ffbb33);
            box-shadow: 0 5px 15px rgba(255, 170, 0, 0.5);
        }

        footer {
            text-align: center;
            padding: 20px;
            color: #fff;
            background-color: #1a1b33;
            margin-top: 30px;
        }
    </style>
</head>

<body>
    <?php include('Source/Nav/header.php'); ?>

    <header class="custom-header">
        <a href="Build Your Own Custom Computer.php">
            <button>Build Your Own Custom Computer</button>
        </a>
    </header>

    <div class="container">
        <h1>Custom Computer <span>Peripherals</span></h1>

        <div class="product-grid">
            <?php if (!empty($imageFiles)): ?>
                <?php foreach ($imageFiles as $imageFile): ?>
                    <div class="product-card">
                        <img src="imgs/Peripherals/<?php echo $imageFile; ?>" alt="Product Image">
                        <h3 class="card-title">Peripherals</h3>
                        <p>zohaib project - High Quality | NEW</p>
                        <div class="price"><?php echo generateRandomPrice(); ?></div>
                        <button class="btn-custom">Add to Cart</button>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p style="text-align:center;">No images found in Peripherals folder.</p>
            <?php endif; ?>
        </div>
    </div>

    <?php include('Source/Nav/footer.php'); ?>
</body>

</html>
