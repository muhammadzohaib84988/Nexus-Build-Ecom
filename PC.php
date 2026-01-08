<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('Source/Nav/link.php'); ?>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            color: #fff;
            background-color: #0a0b1e;
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
        }

        .custom-header button:hover {
            background-color: darkgreen;
        }

        .product-card {
            background-color: #1a1b33;
            border: none;
            border-radius: 10px;
            text-align: center;
            padding: 10px;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .product-card img {
            max-height: 150px;
            object-fit: cover;
            margin-bottom: 10px;
            border-radius: 5px;
        }

        .product-card .card-title {
            font-size: 1rem;
            margin-bottom: 10px;
        }

        .product-card .btn-custom {
            background-color: #e53637;
            color: white;
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
        }

        .product-card .btn-custom:hover {
            background-color: #ffaa00;
        }
    </style>
</head>

<body>
    <!-- Header -->
    <?php include('Source/Nav/header.php'); ?>

    <!-- Main Content -->
    <header class="custom-header">
        <a href="Build Your Own Custom Computer.php">
            <button>Build Your Own Custom Computer</button>
        </a>
    </header>

    <div class="container my-5">
        <div class="row text-center">
            <!-- Product Cards -->
            <?php
            $products = [
                ["Casing", "imgs/casing/6-2-2-1-430x430.jpg", "Casing.php"],
                ["Motherboards", "imgs/motherboard/PRO-B650M.jpg", "Motherboard.php"],
                ["Processors", "imgs/Processor/INTEL-1-700x700.jpg", "Processor.php"],
                ["Graphics Cards", "imgs/Graphics Card/MSI-GeForce-RTX-4090-VENTUS-3X-E-24G-OC-1-700x560.jpg", "Graphics Cards.php"],
                ["RAM", "imgs/RAM/32GB-5200MHz-LANCER-DDR5-DESKTOP-RGB-Dual-Pack-16-x-2.jpg", "RAM.php"],
                ["Storage (HDD & SSD)", "imgs/Storage/legend_710_1920x648-1-700x236.jpg", "Storage (HDD & SSD).php"],
                ["Power Supply Units", "imgs/Power Supplies/ROG-STRIX-1200W-Gold-Aura-Edition-700x475.jpg", "Power Supply Units.php"],
                ["Cooling Systems", "imgs/CPU Coolers/AG400-DIGITAL-RGB-PLUS.jpg", "Cooling Systems.php"],
                ["Monitors", "imgs/Monitors/ROG-Strix-XG32VC.jpg", "Monitors.php"],
                ["Peripherals", "imgs/Peripherals/PRIME-ARGB-EXTENSION-CABLE-VGA-700x554.jpg", "Peri.php"],
                ["Mouse", "imgs/Mouse/logitech-signature-m650-l-wireless-mouse-black-3.jpg", "Mouse.php"],
                ["Speakers", "imgs/Speakers/01q8w1q059wX3VxyNOEHUMn-17.jpg", "Speakers.php"]
            ];

            foreach ($products as $product) {
                echo '
                <div class="col-md-3 my-3">
                    <div class="card product-card">
                        <img src="' . $product[1] . '" class="card-img-top" alt="' . $product[0] . '">
                        <div class="card-body">
                            <h5 class="card-title">' . $product[0] . '</h5>
                            <a href="' . $product[2] . '" class="btn btn-custom">View Products</a>
                        </div>
                    </div>
                </div>
                ';
            }
            ?>
        </div>
    </div>

    <!-- Footer -->
    <?php include('Source/Nav/footer.php'); ?>
</body>

</html>
