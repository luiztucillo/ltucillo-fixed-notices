<?php

/**
 * Class WC_WooMercadoPago_Helpers_CurrencyConverterTest
 */
class WC_WooMercadoPago_Helpers_CurrencyConverterTest extends WP_UnitTestCase_Base
{
    public function setUp()
    {
        parent::setUp();
        $this->createMock(WC_WooMercadoPago_Log::class);
    }

    public function testInstanceOf()
    {
        $instance = WC_WooMercadoPago_Helpers_CurrencyConverter::getInstance();
        $this->assertInstanceOf(WC_WooMercadoPago_Helpers_CurrencyConverter::class, $instance);
    }

    public function testCheckEnabled()
    {
        $mock = $this->createMock(WC_WooMercadoPago_BasicGateway::class);
        $mock->method('getOption')
            ->willReturn(true);

        $instance = WC_WooMercadoPago_Helpers_CurrencyConverter::getInstance();
        $enabled = $instance->isEnabled($mock);

        $this->assertTrue($enabled);
    }
}
