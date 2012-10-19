<?php
require_once __DIR__ . '/includes.php';

// create the invoice
$invoice = new \Clearbooks_Soap_1_0_Invoice();
$invoice->creditTerms = 30;
$invoice->dateCreated = date( 'Y-m-d' );
$invoice->dateDue     = date( 'Y-m-d', strtotime( '+28 days' ) );
$invoice->description = 'API Test Invoice';
$invoice->entityId    = 16;
$invoice->status      = 'approved';
$invoice->type        = 'sales';

// add an item to the invoice
$item = new \Clearbooks_Soap_1_0_Item();
$item->description = 'Line Item #1';
$item->quantity    = 1;
$item->type        = 1001001;
$item->unitPrice   = number_format( 29.99 / 1.2, 2 );
$item->vatRate     = '0.2';
$invoice->items[]  = $item;

$invoiceReturn = $client->createInvoice( $invoice );
print_r( $invoiceReturn );