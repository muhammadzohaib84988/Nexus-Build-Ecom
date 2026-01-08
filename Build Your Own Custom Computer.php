<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('Source/Nav/link.php'); ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Build Your Own Custom Computer</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            color: white;
            background-color: #0a0b1e;
            margin: 0;
            padding: 0;
        }

        h1 {
            font-size: 2rem;
            color: #fff;
            text-align: center;
            margin: 20px 0;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
        }

        .grid-item {
            background-color: #1a1b33;
            padding: 20px;
            text-align: center;
            border-radius: 8px;
            border: 2px solid #333;
        }

        .grid-item:hover {
            background-color: #2b2c47;
            border-color: #ffaa00;
        }

        .grid-item button {
            background-color: #ffaa00;
            color: black;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        .grid-item button:hover {
            background-color: #e53637;
            color: white;
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.8);
            overflow-y: auto;
        }

        .modal-content {
            background-color: #1a1b33;
            margin: 5% auto;
            padding: 20px;
            border-radius: 8px;
            max-width: 80%;
            text-align: center;
        }

        .modal-content img {
            width: 120px;
            height: 120px;
            margin: 10px;
            cursor: pointer;
            border: 2px solid #333;
            border-radius: 5px;
        }

        .modal-content img:hover {
            transform: scale(1.1);
            border-color: #ffaa00;
            transition: 0.3s;
        }

        .close-btn {
            color: #fff;
            float: right;
            font-size: 1.5rem;
            cursor: pointer;
        }

        .selected-item {
            margin: 20px auto;
            padding: 20px;
            text-align: center;
            background-color: #1a1b33;
            border-radius: 8px;
            color: #fff;
        }

        .selected-item img {
            width: 150px;
            height: 150px;
        }

        .image-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
        }

        .image-container div {
            text-align: center;
        }

        .image-container img {
            width: 150px;
            height: 150px;
            border-radius: 10px;
            border: 2px solid #333;
        }

        .image-container img:hover {
            border-color: #ffaa00;
        }

    </style>
</head>

<body>
    <!-- Header -->
    <?php include('Source/Nav/header.php'); ?>

    <h1>Build Your Own Custom Computer</h1>

    <div class="container">
        <div class="grid">
            <!-- Grid Items -->
            <div class="grid-item">
                <button id="casingButton">Click Here to Add Casing</button>
            </div>
            <div class="grid-item">
                <button id="cpuCoolersButton">Click Here to Add CPU Coolers</button>
            </div>
            <div class="grid-item">
                <button id="customizedPcButton">Click Here to Add Customized PC</button>
            </div>
            <div class="grid-item">
                <button id="monitorsButton">Click Here to Add Monitors</button>
            </div>
            <div class="grid-item">
                <button id="mouseButton">Click Here to Add Mouse</button>
            </div>
            <div class="grid-item">
                <button id="peripheralsButton">Click Here to Add Peripherals</button>
            </div>
            <div class="grid-item">
                <button id="powerSupplyButton">Click Here to Add Power Supply</button>
            </div>
            <div class="grid-item">
                <button id="ramButton">Click Here to Add RAM</button>
            </div>
        </div>
    </div>

    <!-- Dynamic Modals -->
    <?php
    $categories = [
        'Casing' => 'imgs/Casing',
        'CPU Coolers' => 'imgs/CPU Coolers',
        'Customized PC' => 'imgs/Customized PC',
        'Monitors' => 'imgs/Monitors',
        'Mouse' => 'imgs/Mouse',
        'Peripherals' => 'imgs/Peripherals',
        'Power Supplies' => 'imgs/Power Supplies',
        'RAM' => 'imgs/RAM'
    ];

    foreach ($categories as $category => $path) {
        echo "<div id='{$category}Modal' class='modal'>
                <div class='modal-content'>
                    <span class='close-btn' onclick=\"closeModal('{$category}Modal')\">&times;</span>
                    <h2>Select $category</h2>
                    <div class='image-container'>";

        $images = glob("$path/*.{jpg,jpeg,png,gif}", GLOB_BRACE);
        foreach ($images as $image) {
            $imageName = basename($image);
            $price = rand(40000, 50000);
            echo "<div>
                    <img src='$path/$imageName' alt='$imageName' onclick=\"selectImage('$category','$imageName',$price)\">
                    <p>$imageName</p>
                    <p>Price: PKR $price</p>
                  </div>";
        }

        echo "</div>
                </div>
              </div>";
    }
    ?>

    <div id="selectedItem" class="selected-item" style="display: none;">
        <h2>Selected Items</h2>
        <div id="selectedImages"></div>
        <p id="totalPrice"></p>
    </div>

    <!-- Footer -->
    <?php include('Source/Nav/footer.php'); ?>

    <script>
        const selectedItems = {};

        function openModal(modalId) {
            console.log("Opening modal:", modalId);
            const modal = document.getElementById(modalId);
            if (!modal) {
                console.error("Modal not found:", modalId);
                return;
            }
            modal.style.display = 'block';
        }

        function closeModal(modalId) {
            console.log("Closing modal:", modalId);
            const modal = document.getElementById(modalId);
            if (!modal) {
                console.error("Modal not found:", modalId);
                return;
            }
            modal.style.display = 'none';
        }

        function selectImage(category, imageName, price) {
            selectedItems[category] = { imageName, price };
            updateSelectedItems();
        }

        function updateSelectedItems() {
            const selectedImagesDiv = document.getElementById('selectedImages');
            const totalPriceElement = document.getElementById('totalPrice');
            selectedImagesDiv.innerHTML = '';

            let total = 0;

            for (const category in selectedItems) {
                const item = selectedItems[category];
                const div = document.createElement('div');
                div.innerHTML = `
                    <h3>${category}</h3>
                    <img src="imgs/${category}/${item.imageName}" alt="${item.imageName}">
                    <p>${item.imageName}</p>
                    <p>Price: PKR ${item.price}</p>
                `;
                selectedImagesDiv.appendChild(div);
                total += item.price;
            }

            totalPriceElement.textContent = `Total Price: PKR ${total}`;
            document.getElementById('selectedItem').style.display = 'block';
        }

        const categories = [
            'Casing', 'CPU Coolers', 'Customized PC', 'Monitors', 'Mouse', 'Peripherals', 'Power Supplies', 'RAM'
        ];

        categories.forEach(category => {
            const buttonId = `${category.toLowerCase().replace(/\s+/g, '')}Button`;
            const modalId = `${category}Modal`;

            const button = document.getElementById(buttonId);
            if (button) {
                button.addEventListener('click', () => openModal(modalId));
            } else {
                console.error("Button not found:", buttonId);
            }
        });

        window.addEventListener('click', (event) => {
            const modals = categories.map(category => `${category}Modal`);
            modals.forEach(modalId => {
                const modal = document.getElementById(modalId);
                if (event.target === modal) {
                    closeModal(modalId);
                }
            });
        });
    </script>
</body>

</html>
