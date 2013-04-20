<table>
    <?php
    foreach ($data['viewinglist'] as $viewing) {
        ?>
        <tr>     
            <td><?= $viewing->id ?></td>
            <td><?= $viewing->userid ?></td>
            <td><?= $viewing->dateofviewing ?></td>
            <td><a href="<?= SITE_ROOT ?>/index.php?page=viewing&action=delete&id=<?= $viewing->id ?>" onClick="return confirm('Are you sure?');">Cancel</a></td>
        </tr>
        <?php
    }
    ?>
</tbody>
</table>

