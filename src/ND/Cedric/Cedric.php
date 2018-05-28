<?php
/**
 * Copyright (C) 2018 Nicolas Damiens nicolas@damiens.info
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */
namespace ND\Cedric;

class Cedric extends \Slim\App {
    public function setup() {
      // Get container
      $container = $app->getContainer();

      // Register component on container
      $container['view'] = function ($container) {
          $view = new \Slim\Views\Twig('path/to/templates', [
              'cache' => 'path/to/cache'
          ]);

          // Instantiate and add Slim specific extension
          $basePath = rtrim(str_ireplace('index.php', '', $container->get('request')->getUri()->getBasePath()), '/');
          $view->addExtension(new \Slim\Views\TwigExtension($container->get('router'), $basePath));

          return $view;
      };
    }
}
