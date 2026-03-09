<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Галерея котиков</title>
    <style>
        body { font-family: 'Courier New', Courier, monospace; margin: 0; padding: 20px; }
        header { border-bottom: 1px solid #000; padding-bottom: 10px; margin-bottom: 20px; }
        nav a { text-decoration: none; color: black; font-weight: bold; margin-right: 15px; }
        
        h1 { margin: 10px 0; font-size: 24px; }
        .subtitle { color: #ccc; margin-bottom: 20px; }

        /* Сетка галереи */
        .gallery {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            max-width: 900px;
        }

        .gallery-item {
            width: 100%;
            aspect-ratio: 1 / 1;
            overflow: hidden;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .gallery-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        footer { margin-top: 40px; text-align: center; border-top: 1px solid #eee; padding: 20px; }
    </style>
</head>
<body>

<header>
    <nav>
        <a href="#">About Cats</a> | 
        <a href="#">News</a> | 
        <a href="#">Contacts</a>
    </nav>
</header>

<main>
    <h1>#cats</h1>
    <p class="subtitle">Explore a world of cats</p>

    <div class="gallery">
        <?php
        $dir = 'image/';
        // Проверяем существование директории
        if (is_dir($dir)) {
            $files = scandir($dir);
            
            for ($i = 0; $i < count($files); $i++) {
                // Фильтруем системные файлы и проверяем расширение .jpg
                if (($files[$i] != ".") && ($files[$i] != "..")) {
                    $path = $dir . $files[$i];
                    
                    // проверка: выводим только файлы с расширением jpg или jpeg
                    $ext = strtolower(pathinfo($path, PATHINFO_EXTENSION));
                    if ($ext == 'jpg' || $ext == 'jpeg') {
                        echo '<div class="gallery-item">';
                        echo '<img src="' . $path . '" alt="Cat Image">';
                        echo '</div>';
                    }
                }
            }
        } else {
            echo "<p>Папка 'image' не найдена.</p>";
        }
        ?>
    </div>
</main>

<footer>
    USM © 2026
</footer>

</body>
</html>