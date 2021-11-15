<?php
namespace App;

use Franzose\ClosureTable\Models\Entity;

class Structure extends Entity
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'structures';

    /**
     * ClosureTable model instance.
     *
     * @var \App\StructureClosure
     */
    protected $closure = 'App\StructureClosure';


}
