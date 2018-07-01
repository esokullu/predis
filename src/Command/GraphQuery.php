<?php

/*
 * This file is part of the Predis package.
 *
 * (c) Daniele Alessandri <suppakilla@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Predis\Command;

/**
 * @link http://redis.io/commands/geopos
 *
 * @author Daniele Alessandri <suppakilla@gmail.com>
 */
class GraphQuery extends Command
{
    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return 'GRAPH.QUERY';
    }

    /**
     * {@inheritdoc}
     */
    public function parseResponse($data)
    {
        if(!is_array($data)||count($data)!=2)
            return "";
        if(!is_array($data[0])||count($data[0])<2) 
            return "";
        $vals = array_slice($data[0], 1);
        foreach($vals as $k=>$val)
            $vals[$k] = explode(",", $val);
        return $vals;
    }

}