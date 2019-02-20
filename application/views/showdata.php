<html>
    <head>
        <title>Displaying the details</title>
</head>
<body>
    <table>
        <?php
        foreach($data as $key)
        {
        ?>
        <tr>
            <td><?php echo $key->firstname;?></td>
            <td><?php echo $key->lastname;?></td>
        </tr>
        <?php
        }
        ?>
        </table>
    </body>
    </html>
