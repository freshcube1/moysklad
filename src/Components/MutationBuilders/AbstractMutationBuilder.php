<?php

namespace MoySklad\Components\MutationBuilders;

use MoySklad\Components\Specs\CreationSpecs;
use MoySklad\Components\Specs\LinkingSpecs;
use MoySklad\Entities\AbstractEntity;
use MoySklad\Entities\Account;
use MoySklad\Entities\Cashier;
use MoySklad\Entities\ContactPerson;
use MoySklad\Entities\Contract;
use MoySklad\Entities\Counterparty;
use MoySklad\Entities\Country;
use MoySklad\Entities\Currency;
use MoySklad\Entities\Discount;
use MoySklad\Entities\Documents\Invoices\InvoiceIn;
use MoySklad\Entities\Documents\Invoices\InvoiceOut;
use MoySklad\Entities\Documents\Movements\Demand;
use MoySklad\Entities\Documents\Movements\Enter;
use MoySklad\Entities\Documents\Movements\Loss;
use MoySklad\Entities\Documents\Movements\Supply;
use MoySklad\Entities\Documents\Orders\CustomerOrder;
use MoySklad\Entities\Documents\Orders\PurchaseOrder;
use MoySklad\Entities\Documents\Payments\PaymentIn;
use MoySklad\Entities\Documents\Payments\PaymentOut;
use MoySklad\Entities\Documents\Positions\CustomerOrderPosition;
use MoySklad\Entities\Documents\Positions\EnterPosition;
use MoySklad\Entities\Documents\Positions\RetailShift;
use MoySklad\Entities\Employee;
use MoySklad\Entities\ExpenseItem;
use MoySklad\Entities\Folders\ProductFolder;
use MoySklad\Entities\Group;
use MoySklad\Entities\Misc\Attribute;
use MoySklad\Entities\Misc\Characteristics;
use MoySklad\Entities\Misc\CompanySettings;
use MoySklad\Entities\Misc\CustomEntity;
use MoySklad\Entities\Misc\State;
use MoySklad\Entities\Organization;
use MoySklad\Entities\Products\AbstractProduct;
use MoySklad\Entities\Products\Consignment;
use MoySklad\Entities\Products\Product;
use MoySklad\Entities\Products\Service;
use MoySklad\Entities\Products\Variant;
use MoySklad\Entities\Project;
use MoySklad\Entities\RetailStore;
use MoySklad\Entities\Store;
use MoySklad\Entities\Uom;
use MoySklad\Lists\EntityList;

abstract class AbstractMutationBuilder{
    /**
     * @var AbstractEntity
     */
    protected $e;

    public function __construct(AbstractEntity &$entity){
        $this->e = $entity;
    }

    public function addAccount(Account $account, LinkingSpecs $specs = null){
        return $this->simpleLink($account, $specs);
    }

    public function addCashier(Cashier $cashier, LinkingSpecs $specs = null){
        return $this->simpleLink($cashier, $specs);
    }

    public function addContactPerson(ContactPerson $contactPerson, LinkingSpecs $specs = null){
        return $this->simpleLink($contactPerson, $specs);
    }

    public function addContract(Contract $contract, LinkingSpecs $specs = null){
        return $this->simpleLink($contract, $specs);
    }

    public function addCounterparty(Counterparty $counterparty, LinkingSpecs $specs = null){
        return $this->simpleLink($counterparty, $specs, LinkingSpecs::create([
            "name" => "agent"
        ]));
    }

    public function addCountry(Country $country, LinkingSpecs $specs = null){
        return $this->simpleLink($country, $specs);
    }

    public function addCurrency(Currency $currency, LinkingSpecs $specs = null){
        return $this->simpleLink($currency, $specs);
    }

    public function addDiscount(Discount $discount, LinkingSpecs $specs = null){
        return $this->simpleLink($discount, $specs);
    }

    public function addEmployee(Employee $employee, LinkingSpecs $specs = null){
        return $this->simpleLink($employee, $specs);
    }

    public function addExpenseItem(ExpenseItem $expenseItem, LinkingSpecs $specs = null){
        return $this->simpleLink($expenseItem, $specs);
    }

    public function addGroup(Group $group, LinkingSpecs $specs = null){
        return $this->simpleLink($group, $specs);
    }

    public function addOrganization(Organization $organization, LinkingSpecs $specs = null){
        return $this->simpleLink($organization, $specs);
    }

    public function addProject(Project $project, LinkingSpecs $specs = null){
        return $this->simpleLink($project, $specs);
    }

    public function addRetailStore(RetailStore $retailStore, LinkingSpecs $specs = null){
        return $this->simpleLink($retailStore, $specs);
    }

    public function addStore(Store $store, LinkingSpecs $specs = null){
        return $this->simpleLink($store, $specs);
    }

    public function addUom(Uom $uom, LinkingSpecs $specs = null){
        return $this->simpleLink($uom, $specs);
    }

    public function addInvoiceIn(InvoiceIn $invoiceIn, LinkingSpecs $specs = null){
        return $this->simpleLink($invoiceIn, $specs);
    }

    public function addInvoiceOut(InvoiceOut $invoiceOut, LinkingSpecs $specs = null){
        return $this->simpleLink($invoiceOut, $specs);
    }

    public function addDemand(Demand $demand, LinkingSpecs $specs = null){
        return $this->simpleLink($demand, $specs);
    }

    public function addEnter(Enter $enter, LinkingSpecs $specs = null){
        return $this->simpleLink($enter, $specs);
    }

    public function addLoss(Loss $loss, LinkingSpecs $specs = null){
        return $this->simpleLink($loss, $specs);
    }

    public function addSupply(Supply $supply, LinkingSpecs $specs = null){
        return $this->simpleLink($supply, $specs);
    }

    public function addCustomerOrder(CustomerOrder $customerOrder, LinkingSpecs $specs = null){
        return $this->simpleLink($customerOrder, $specs);
    }

    public function addPurchaseOrder(PurchaseOrder $purchaseOrder, LinkingSpecs $specs = null){
        return $this->simpleLink($purchaseOrder, $specs);
    }

    public function addPaymentIn(PaymentIn $paymentIn, LinkingSpecs $specs = null){
        return $this->simpleLink($paymentIn, $specs);
    }

    public function addPaymentOut(PaymentOut $paymentOut, LinkingSpecs $specs = null){
        return $this->simpleLink($paymentOut, $specs);
    }

    public function addCustomerOrderPosition(CustomerOrderPosition $customerOrderPosition, LinkingSpecs $specs = null){
        return $this->simpleLink($customerOrderPosition, $specs);
    }

    public function addEnterPosition(EnterPosition $enterPosition, LinkingSpecs $specs = null){
        return $this->simpleLink($enterPosition, $specs);
    }

    public function addRetailShift(RetailShift $retailShift, LinkingSpecs $specs = null){
        return $this->simpleLink($retailShift, $specs);
    }

    public function addProductFolder(ProductFolder $folder, LinkingSpecs $specs = null){
        return $this->simpleLink($folder, $specs);
    }

    public function addAttribute(Attribute $attribute, LinkingSpecs $specs = null){
        return $this->simpleLink($attribute, $specs);
    }

    public function addCharacteristics(Characteristics $characteristics, LinkingSpecs $specs = null){
        return $this->simpleLink($characteristics, $specs);
    }

    public function addCompanySettings(CompanySettings $companySettings, LinkingSpecs $specs = null){
        return $this->simpleLink($companySettings, $specs);
    }

    public function addCustomEntity(CustomEntity $customEntity, LinkingSpecs $specs = null){
        return $this->simpleLink($customEntity, $specs);
    }

    public function addState(State $state, LinkingSpecs $specs = null){
        return $this->simpleLink($state, $specs);
    }

    public function addConsignment(Consignment $consignment, LinkingSpecs $specs = null){
        return $this->simpleLink($consignment, $specs);
    }

    public function addProduct(Product $product, LinkingSpecs $specs = null){
        return $this->simpleLink($product, $specs);
    }

    public function addService(Service $service, LinkingSpecs $specs = null){
        return $this->simpleLink($service, $specs);
    }

    public function addVariant(Variant $variant, LinkingSpecs $specs = null){
        return $this->simpleLink($variant, $specs);
    }

    public function addPositionList(EntityList $positions){
        $positions->each(function(AbstractProduct $position){
            $position->assortment = [
                'meta' => $position->getMeta()
            ];
            $this->e->links->link($position, LinkingSpecs::create([
                'multiple' => true,
                'name' => "positions",
                'excludedFields' => [
                    'id', 'meta'
                ]
            ]));
        });
        return $this;
    }

    protected function simpleLink(AbstractEntity $linkedEntity, LinkingSpecs $specs, LinkingSpecs $defaultSpecs = null){
        if ( $defaultSpecs && !$specs ) $specs = $defaultSpecs;
        $this->e->links->link($linkedEntity, $specs);
        return $this;
    }

    abstract function execute();
}