<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.10.0
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 * @var mixed $name
 */

$cakeDescription = 'Church in Arcadia YP Database';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">

    <?= $this->Html->css(['normalize.min', 'milligram.min', 'cake', 'home']) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <header>
        <div class="container text-center">
            <a href="/" target="_blank" rel="noopener">
                <img alt="YP Database Logo" src="https://cakephp.org/v2/img/logos/CakePHP_Logo.svg" width="350" />
            </a>
            <h1>
                Welcome to YP Database
            </h1>
        </div>
    </header>
    <main class="main">
        <div class="container">
            <?= $this->Flash->render() ?>
            <div class="content">
                <div class="row">
                    <div class="column">
                        <h4>People</h4>
                        <ul>
                            <li class="bullet success">
                                People: 
                                <?php echo $this->Html->link(
                                    'Index',
                                    ['controller' => 'people', 'action' => 'index'],
                                    ['class' => 'button'],
                                );
                                echo $this->Html->link(
                                    'Add',
                                    ['controller' => 'people', 'action' => 'add'],
                                    ['class' => 'button'],
                                ); ?>
                            </li>
                            <li class="bullet success">
                                Meeting Attendance: 
                                <?php echo $this->Html->link(
                                    'Index',
                                    ['controller' => 'meeting_people', 'action' => 'index'],
                                    ['class' => 'button'],
                                );
                                echo $this->Html->link(
                                    'Add',
                                    ['controller' => 'meeting_people', 'action' => 'add'],
                                    ['class' => 'button'],
                                ); ?>
                            </li>
                            <li class="bullet success">
                                Addresses: 
                                <?php echo $this->Html->link(
                                    'Index',
                                    ['controller' => 'addresses', 'action' => 'index'],
                                    ['class' => 'button'],
                                );
                                echo $this->Html->link(
                                    'Add',
                                    ['controller' => 'addresses', 'action' => 'add'],
                                    ['class' => 'button'],
                                ); ?>
                            </li>
                            <li class="bullet success">
                                Social Media: 
                                <?php echo $this->Html->link(
                                    'Index',
                                    ['controller' => 'social_medias', 'action' => 'index'],
                                    ['class' => 'button'],
                                );
                                echo $this->Html->link(
                                    'Add',
                                    ['controller' => 'social_medias', 'action' => 'add'],
                                    ['class' => 'button'],
                                ); ?>
                            </li>
                            <li class="bullet success">
                                Social Media Types: 
                                <?php echo $this->Html->link(
                                    'Index',
                                    ['controller' => 'social_media_types', 'action' => 'index'],
                                    ['class' => 'button'],
                                );
                                echo $this->Html->link(
                                    'Add',
                                    ['controller' => 'social_media_types', 'action' => 'add'],
                                    ['class' => 'button'],
                                ); ?>
                            </li>
                        </ul>
                    </div>
                    <div class="column">
                        <h4>Meetings</h4>
                        <ul>
                            <li class="bullet success">
                                Meetings: 
                                <?php echo $this->Html->link(
                                    'Index',
                                    ['controller' => 'meetings', 'action' => 'index'],
                                    ['class' => 'button'],
                                );
                                echo $this->Html->link(
                                    'Add',
                                    ['controller' => 'meetings', 'action' => 'add'],
                                    ['class' => 'button'],
                                ); ?>
                            </li>
                            <li class="bullet success">
                                Meeting Locations: 
                                <?php echo $this->Html->link(
                                    'Index',
                                    ['controller' => 'meeting_locations', 'action' => 'index'],
                                    ['class' => 'button'],
                                );
                                echo $this->Html->link(
                                    'Add',
                                    ['controller' => 'meeting_locations', 'action' => 'add'],
                                    ['class' => 'button'],
                                ); ?>
                            </li>
                            <li class="bullet success">
                                Meeting Location Notify Settings: 
                                <?php echo $this->Html->link(
                                    'Index',
                                    ['controller' => 'meeting_locations_notify', 'action' => 'index'],
                                    ['class' => 'button'],
                                );
                                echo $this->Html->link(
                                    'Add',
                                    ['controller' => 'meeting_locations_notify', 'action' => 'add'],
                                    ['class' => 'button'],
                                ); ?>
                            </li>
                            <li class="bullet success">
                                Meeting Types: 
                                <?php echo $this->Html->link(
                                    'Index',
                                    ['controller' => 'meeting_types', 'action' => 'index'],
                                    ['class' => 'button'],
                                );
                                echo $this->Html->link(
                                    'Add',
                                    ['controller' => 'meeting_types', 'action' => 'add'],
                                    ['class' => 'button'],
                                ); ?>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="column">
                        <h4>Users</h4>
                        <ul>
                            <li class="bullet success">
                                Users: 
                                <?php echo $this->Html->link(
                                    'Index',
                                    ['controller' => 'users', 'action' => 'index'],
                                    ['class' => 'button'],
                                );
                                echo $this->Html->link(
                                    'Add',
                                    ['controller' => 'users', 'action' => 'add'],
                                    ['class' => 'button'],
                                ); ?>
                            </li>
                            <li class="bullet success">
                                User Types: 
                                <?php echo $this->Html->link(
                                    'Index',
                                    ['controller' => 'user_types', 'action' => 'index'],
                                    ['class' => 'button'],
                                );
                                echo $this->Html->link(
                                    'Add',
                                    ['controller' => 'user_types', 'action' => 'add'],
                                    ['class' => 'button'],
                                ); ?>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>