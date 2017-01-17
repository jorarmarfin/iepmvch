    <?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlumnosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumno', function (Blueprint $table) {
            $table->increments('id');

            $table->string('paterno',25)->nullable()->index();
            $table->string('materno',25)->nullable()->index();
            $table->string('nombres',50)->nullable()->index();
            $table->string('dni',20)->nullable()->index()->unique();
            $table->integer('idgrado')->nullable();
            $table->date('fechanacimiento')->nullable();
            $table->integer('idpais')->nullable();
            $table->integer('idubigeonacimiento')->nullable();
            $table->string('religion',100)->nullable();
            $table->boolean('bautismo')->nullable()->default(false);
            $table->boolean('comunion')->nullable()->default(false);
            $table->boolean('confirmacion')->nullable()->default(false);
            $table->integer('idubigeo')->nullable();
            $table->mediumtext('direccion')->nullable();
            $table->string('telefonos',100)->nullable();
            $table->string('telefonoemergencia1',100)->nullable();
            $table->string('telefonoemergencia2',100)->nullable();
            $table->string('responsableeconomico',15)->nullable();
            $table->string('colegioprocedencia',200)->nullable();
            $table->boolean('esespecial')->nullable()->default(false);
            $table->mediumtext('discapacidad')->nullable();
            $table->integer('idestado')->nullable();
            $table->text('observacion')->nullable();
            $table->string('foto',100)->nullable()->default('avatars/nofoto.jpg');
            $table->integer('idsexo')->nullable();
            $table->timestamps();
            $table->foreign('idgrado')->references('id')->on('grado');
            $table->foreign('idubigeonacimiento')->references('id')->on('catalogo');
            $table->foreign('idpais')->references('id')->on('catalogo');
            $table->foreign('idubigeo')->references('id')->on('catalogo');
            $table->foreign('idestado')->references('id')->on('catalogo');
            $table->foreign('idsexo')->references('id')->on('catalogo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alumno');
    }
}
