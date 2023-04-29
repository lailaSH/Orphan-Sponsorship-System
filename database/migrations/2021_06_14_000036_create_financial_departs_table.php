<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateFinancialDepartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('financial_departs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('warranty_request_id')->unsigned()->unique();
            $table->string('MoneyFromParents')->nullable();
            $table->string('MoneyFromRelatives')->nullable();
            $table->string('MoneyFromManGood')->nullable();
            $table->integer('AmountOfParents')->nullable();
            $table->integer('AmountOfRelatives')->nullable();
            $table->integer('AmountOfManGood')->nullable();
            $table->string('WhereToGetHelp');
            $table->date('LastDateOfReceipt')->nullable();
            $table->text('OtherAffiliatedAssociations');
            $table->integer('ChildrensSponsoredByAnotherAssociation');
            $table->string('AmountEachChild')->nullable();
            $table->string('BeneficiaryOf_UN');
            $table->string('NumberOfBeneficiaries')->nullable();
            $table->integer('LastAmountReceivedFrom_UN_ForEachPerson')->nullable();
            $table->integer('TotalAmountUN')->nullable();
            $table->string('RetirementSalary');
            $table->integer('AmountRetirementSalary')->nullable();
            $table->integer('NumberWorkersInFamily');
            $table->string('EveryoneSalary')->nullable();
            $table->integer('NumberOfPeopleExpensesMotherTakesCareOf');
            $table->string('RelativeRelation')->nullable();
            $table->string('Reason')->nullable();
            $table->string('MotherMasteredJob');
            $table->string('job')->nullable();
            $table->string('ProjectProposal');
            $table->string('Project')->nullable();
            $table->integer('ExpectedCostProject')->nullable();
            $table->integer('NumberChildrenTravels');
            $table->integer('MonthlyAmount')->nullable();
            $table->foreign('warranty_request_id')->references('id')->on('warrantyrequests')
                ->onDelete('cascade');
            $table->integer('financial_score');
            $table->timestamps();
        });

        $MoneyFromParents = array('true', 'false');
        $MoneyFromRelatives = array('true', 'false');
        $MoneyFromManGood = array('true', 'false');
        $WhereToGetHelp = array('لا يوجد', 'يسبس', 'مخت');
        $OtherAffiliatedAssociations = array('شسيسش', 'ييسس', 'نغتة', 'ثيصثثصصثي');
        $ChildrensSponsoredByAnotherAssociation = array('0', '1', '3', '4');
        $BeneficiaryOf_UN = array('نعم', 'لا');
        $RetirementSalary = array('نعم','لا');
        $AmountRetirementSalary = array('56465','5644',null);
        $NumberWorkersInFamily = array('0','2','4');
        $NumberOfPeopleExpensesMotherTakesCareOf = array('0','1','4');
        $MotherMasteredJob = array('لا');
        $ProjectProposal = array('لا');
        $NumberChildrenTravels = array('0','0','2','4');



        $warranty_request_id = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53, 54, 56, 57, 58, 59, 60, 61, 62, 63, 64, 67, 68, 69, 70, 71, 72, 73, 74, 75, 76, 77, 78);
        $financial_score = array(0,1,2,3,4,5,6);
        for ($i = 0; $i < 70; $i++) {
            DB::table('financial_departs')->insert(
                array(
                    'MoneyFromParents' => $MoneyFromParents[rand(0, 1)],
                    'MoneyFromRelatives' => $MoneyFromRelatives[rand(0, 1)],
                    'MoneyFromManGood' => $MoneyFromManGood[rand(0, 1)],
                    'WhereToGetHelp' => $WhereToGetHelp[rand(0, 2)],
                    'ChildrensSponsoredByAnotherAssociation' => $ChildrensSponsoredByAnotherAssociation[rand(0, 3)],
                    'OtherAffiliatedAssociations' => $OtherAffiliatedAssociations[rand(0, 3)],


                    'BeneficiaryOf_UN' => $BeneficiaryOf_UN[rand(0, 1)],
                    'RetirementSalary' => $RetirementSalary[rand(0,1)],
                    'AmountRetirementSalary'=> $AmountRetirementSalary[rand(0,2)],
                    'NumberWorkersInFamily'=> $NumberWorkersInFamily[rand(0,2)],
                    'NumberWorkersInFamily'=> $NumberWorkersInFamily[rand(0,2)],
                    'NumberOfPeopleExpensesMotherTakesCareOf'=>$NumberOfPeopleExpensesMotherTakesCareOf[rand(0,2)],
                    'MotherMasteredJob'=>$MotherMasteredJob[0],
                    'ProjectProposal'=>$ProjectProposal[0],
                    'NumberChildrenTravels'=>$NumberChildrenTravels[rand(0,3)],

                    'warranty_request_id' => $warranty_request_id[$i],
                    'financial_score' => $financial_score[rand(0, 5)],
                    
                )
            );
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('financial_departs');
    }
}
