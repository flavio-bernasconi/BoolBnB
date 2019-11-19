<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('flats', function (Blueprint $table) {

        $table -> bigInteger('user_id') -> unsigned() -> index();//tabella riferimento
        $table -> foreign('user_id', 'relationFlatUser')
               -> references('id')//colonna
               -> on('users');//tabella
      });

      Schema::table('details', function (Blueprint $table) {

        $table -> bigInteger('flat_id') -> unsigned() -> index();//tabella riferimento
        $table -> foreign('flat_id', 'relationDetailFlat')
               -> references('id')//colonna
               -> on('flats');//tabella
      });

      Schema::table('addresses', function (Blueprint $table) {

        $table -> bigInteger('flat_id') -> unsigned() -> index();//tabella riferimento
        $table -> foreign('flat_id', 'relationAddressFlat')
               -> references('id')//colonna
               -> on('flats');//tabella
      });

      Schema::table('messages', function (Blueprint $table) {

        $table -> bigInteger('flat_id') -> unsigned() -> index();//tabella riferimento
        $table -> foreign('flat_id', 'relationMessageFlat')
               -> references('id')//colonna
               -> on('flats');//tabella
      });

      Schema::table('flat_service', function (Blueprint $table) {

        $table -> bigInteger('flat_id') -> unsigned() -> index();//tabella riferimento
        $table -> foreign('flat_id', 'relationFlatService')
               -> references('id')//colonna
               -> on('flats');//tabella

        $table -> bigInteger('service_id') -> unsigned() -> index();//tabella riferimento
        $table -> foreign('service_id', 'relationServiceFlat')
               -> references('id')//colonna
               -> on('services');//tabella
      });
      Schema::table('flat_payment', function (Blueprint $table) {

        $table -> bigInteger('flat_id') -> unsigned() -> index();//tabella riferimento
        $table -> foreign('flat_id', 'relationFlatPayment')
               -> references('id')//colonna
               -> on('flats');//tabella

        $table -> bigInteger('payment_id') -> unsigned() -> index();//tabella riferimento
        $table -> foreign('payment_id', 'relationPaymentFlat')
               -> references('id')//colonna
               -> on('payments');//tabella
      });



    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('flats', function (Blueprint $table) {

        $table -> dropForeign('relationFlatUser');
        $table -> dropColumn('user_id');

      });

      Schema::table('details', function (Blueprint $table) {

        $table -> dropForeign('relationDetailFlat');
        $table -> dropColumn('flat_id');

      });

      Schema::table('addresses', function (Blueprint $table) {

        $table -> dropForeign('relationAddressFlat');
        $table -> dropColumn('flat_id');

      });

      Schema::table('messages', function (Blueprint $table) {

        $table -> dropForeign('relationMessageFlat');
        $table -> dropColumn('flat_id');

      });

      Schema::table('flat_service', function (Blueprint $table) {

        $table -> dropForeign('relationFlatService');
        $table -> dropColumn('flat_id');

        $table -> dropForeign('relationServiceFlat');
        $table -> dropColumn('service_id');

      });
      Schema::table('flat_payment', function (Blueprint $table) {

        $table -> dropForeign('relationFlatPayment');
        $table -> dropColumn('flat_id');

        $table -> dropForeign('relationPaymentFlat');
        $table -> dropColumn('payment_id');

      });

    }
}
