<h2> 
   <a href="/genres/lire/<?= $genre['gen_id'] ?>"> 
   </a>
</h2>

<h1>
    <a href="/genres/lire/<?= $genre['gen_id'] ?>"><?= $genre['gen_nom']?> </a> 
</h1>

<p> 
    <?= $genre['gen_desc']?> 
</p>

<a href="/genres/index/<?= $genre['gen_id'] ?>"> 
   <input type="button" name="" value="Retourner à la liste des genres">
</a>
