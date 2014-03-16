Cupon 2014
=========

<p>Aplicacion de pruebas generada a partir de los pasos descritos para aprender symfony por Javier Eguiluz en su libro (http://www.symfony.es/libro)</p>

<p>El codigo Original final lo podeis encontrar aqui : https://github.com/javiereguiluz/Cupon/tree/2.3</p>


<p>Esta versión esta desarrollada sobre symfony 2.4.</p>

<h2>Instalación</h2>

<ol>
<li>Asegurarse de tener el servidor Apache/mysql/php bien configurados</li>
<li><code>mkdir cupon2014</code></li>
<li><code>git clone https://github.com/enric612/cupon2014.git cupon2014</code>/<li>
<li><code>curl -s https://getcomposer.org/installer | php</code> Esto es para instalar composer, para mas información, consultar como instalar composer <a href="http://librosweb.es/composer/capitulo_1/instalacion_en_servidores_linux.html">aqui</a></li>
<li><code>php composer.phar install</code> (Instalar vendors....) </li>
</ol>

<h2>Uso y condiguración</h2>
<ol>
<li>Crear una base de datos bien a mano o bien con el comando <code>php app/console doctrine:database:create</code></li>
<li>Configurar el acceso a base de datos (servidor, usuario...) en <code>app/config/parameters.yml</code></li>
<li>Crear el schema de la base de datos con <code>php app/console doctrine:schema:create</code></li>
<li>Carga los datos de prueba con los siguientes comandos:

<ul>
<li>
<code>php app/console doctrine:fixtures:load</code> para cargar todos los datos de
prueba de la aplicación terminada (incluye todas las propiedades relacionadas
con la seguridad). Si se muestra una excepción de tipo <em>Truncating table with foreign keys fails</em> , ejecuta el siguiente comando: <code>php app/console doctrine:fixtures:load --append</code>
</li>
<li>
<code>php app/console doctrine:fixtures:load --fixtures=app/Resources</code> para
cargar una versión simplificada de los datos de prueba. Utiliza estos datos
si estás creando la aplicación a mano y todavía no has llegado al capítulo
relacionado con la seguridad.</li></ul>
<li>Genera los web assets con Assetic: <code>php app/console assetic:dump --env=prod --no-debug</code>
</li>
<li>Asegúrate de que el directorio <code>web/uploads/images/</code> tiene permisos de escritura.</li>
</ol>
<p>Si tienes algún problema, limpia la cache:</p>

<ul>
<li>Entorno de desarrollo: <code>php app/console cache:clear</code>
</li>
<li>Entorno de producción: <code>php app/console cache:clear --env=prod</code>
</li>

</ul>


<p>Para mas información consultar repositorio original de la aplicación : https://github.com/javiereguiluz/Cupon/tree/2.3 y/o el libro  <strong><a href="http://www.symfony.es/libro/">Desarrollo web ágil con Symfony2</a></strong> publicado por Javier Eguiluz. </p>

<h3>>Aviso este repositorio no está terminado, abstenerse de probar si no se sabe lo que se hace </h3>
