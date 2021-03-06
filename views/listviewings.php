<hr/>
<h3>Booked Viewings</h3>
<table>
    <tr>
        <th>Viewing id</th>
        <th>User id</th>
        <th>Car id</th>
        <th>Date of viewing</th>
        <th>Delete</th>
    </tr>
    <?php
    foreach ($data['viewinglist'] as $viewing) {
        ?>
        <tr>     
            <td><?= $viewing->id ?></td>
            <td><a href="<?= SITE_ROOT ?>/index.php?page=users&action=profile&id=<?= $viewing->userid ?>"><?= $viewing->userid ?></a></td>
            <td><a href="<?= SITE_ROOT ?>/index.php?page=car&action=showdetails&id=<?= $viewing->carid ?>">View car details</a></td>
            <td><?= date('Y-m-d',$viewing->dateofviewing); ?></td>
            <td><a href="<?= SITE_ROOT ?>/index.php?page=viewing&action=delete&id=<?= $viewing->id ?>" onClick="return confirm('Are you sure?');">Cancel</a></td>
        </tr>
        <?php
    }
    ?>
</tbody>
</table>

