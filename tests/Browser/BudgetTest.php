<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

class BudgetTest extends DuskTestCase
{

    public function testCreateBudget()
    {
        $admin = \App\User::find(1);
        $budget = factory('App\Budget')->make();

        

        $this->browse(function (Browser $browser) use ($admin, $budget) {
            $browser->loginAs($admin)
                ->visit(route('admin.budgets.index'))
                ->clickLink('Add new')
                ->select("project_id", $budget->project_id)
                ->select("category_id", $budget->category_id)
                ->select("year_id", $budget->year_id)
                ->type("amount", $budget->amount)
                ->press('Save')
                ->assertRouteIs('admin.budgets.index')
                ->assertSeeIn("tr:last-child td[field-key='project']", $budget->project->name)
                ->assertSeeIn("tr:last-child td[field-key='category']", $budget->category->name)
                ->assertSeeIn("tr:last-child td[field-key='year']", $budget->year->name)
                ->assertSeeIn("tr:last-child td[field-key='amount']", $budget->amount)
                ->logout();
        });
    }

    public function testEditBudget()
    {
        $admin = \App\User::find(1);
        $budget = factory('App\Budget')->create();
        $budget2 = factory('App\Budget')->make();

        

        $this->browse(function (Browser $browser) use ($admin, $budget, $budget2) {
            $browser->loginAs($admin)
                ->visit(route('admin.budgets.index'))
                ->click('tr[data-entry-id="' . $budget->id . '"] .btn-info')
                ->select("project_id", $budget2->project_id)
                ->select("category_id", $budget2->category_id)
                ->select("year_id", $budget2->year_id)
                ->type("amount", $budget2->amount)
                ->press('Update')
                ->assertRouteIs('admin.budgets.index')
                ->assertSeeIn("tr:last-child td[field-key='project']", $budget2->project->name)
                ->assertSeeIn("tr:last-child td[field-key='category']", $budget2->category->name)
                ->assertSeeIn("tr:last-child td[field-key='year']", $budget2->year->name)
                ->assertSeeIn("tr:last-child td[field-key='amount']", $budget2->amount)
                ->logout();
        });
    }

    public function testShowBudget()
    {
        $admin = \App\User::find(1);
        $budget = factory('App\Budget')->create();

        


        $this->browse(function (Browser $browser) use ($admin, $budget) {
            $browser->loginAs($admin)
                ->visit(route('admin.budgets.index'))
                ->click('tr[data-entry-id="' . $budget->id . '"] .btn-primary')
                ->assertSeeIn("td[field-key='project']", $budget->project->name)
                ->assertSeeIn("td[field-key='category']", $budget->category->name)
                ->assertSeeIn("td[field-key='year']", $budget->year->name)
                ->assertSeeIn("td[field-key='amount']", $budget->amount)
                ->logout();
        });
    }

}
