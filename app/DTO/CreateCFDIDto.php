<?php

namespace App\DTO;

use JsonSerializable;

class CreateCFDIDto implements JsonSerializable
{
    public function __construct (
        protected readonly array $Receptor,
        protected readonly string $TipoDocumento,
        protected readonly array $Conceptos,
        protected readonly string $UsoCFDI,
        protected readonly int $Serie,
        protected readonly string $FormaPago,
        protected readonly string $MetodoPago,
        protected readonly string $Moneda,
        protected readonly ?bool $EnviarCorreo = false
    ) { }

    public static function fromRequest ( array $request ): self
    {
        return new self(
            Receptor: $request['Receptor'],
            TipoDocumento: $request['TipoDocumento'],
            Conceptos: $request['Conceptos'],
            UsoCFDI: $request['UsoCFDI'],
            Serie: $request['Serie'],
            FormaPago: $request['FormaPago'],
            MetodoPago: $request['MetodoPago'],
            Moneda: $request['Moneda'],
            EnviarCorreo: isset( $request['EnviarCorreo'] ) ? $request['EnviarCorreo'] : false
        );
    }

    public function jsonSerialize(): array
    {
        return [
            'Receptor' => $this->Receptor,
            'TipoDocumento' => $this->TipoDocumento,
            'Conceptos' => $this->Conceptos,
            'UsoCFDI' => $this->UsoCFDI,
            'Serie' => $this->Serie,
            'FormaPago' => $this->FormaPago,
            'MetodoPago' => $this->MetodoPago,
            'Moneda' => $this->Moneda,
            'EnviarCorreo' => $this->EnviarCorreo,
        ];
    }
}