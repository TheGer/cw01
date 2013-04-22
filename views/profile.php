<h3>Client profile</h3>
<hr/>
<p>Name: <?= $data['firstname']; ?></p>
<p>Surname: <?= $data['secondname']; ?></p>
<p>Address: <?= $data['address']; ?></p>
<p><a href="<?= SITE_ROOT ?>/index.php?page=users&action=showedit&id=<?=$data['id']?>">Edit profile?</a></p>
