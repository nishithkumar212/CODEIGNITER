<html>
    <head>
        <title>Details</title>
</head>
<body>
    <table>
        <thead>
            <td>fname</td>
            <td>lname</td>
</thead>
<tbody>
<?php
        foreach($data as $key)
        {
        ?>
        <tr>
            <td><?php echo $key->firstname;?></td>
            <td><?php echo $key->lastname;?></td>
            <td>< ahref="delete/?id=<?php echo $row->id;?>"Delete</a></td>
        <?php
        }
        ?>