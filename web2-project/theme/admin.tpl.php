<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"  href="./styles/table.css">
    <title>АДМИН</title>
</head>
<body>
    <table>
        <thead> 
            <tr>
                <td>ID</td><td>LOGIN</td><td>FIO</td><td>NUMBER</td><td>EMAIL</td><td>GENDER</td><td>BIO</td><td>DATA</td><td>CHECK</td><td>LANGUAGES</td><td>CHANGE</td>
            </tr>
        </thead> 

        <tbody>
            <?php
                foreach($user_table as $row){
                    echo $row;
                }
            ?>
        </tbody>
    </table>

    <table>
        <thead> 
            <tr><td>LANGUAGE</td><td>Q</td></tr>
        </thead> 
        <tbody>
            <?php
                foreach($language_table as $row){
                    echo $row;
                }
            ?>
        </tbody>
    </table>
</body>
</html>

    