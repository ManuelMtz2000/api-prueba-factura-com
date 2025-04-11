<?php

namespace App\DTO;

class CreateClientDto
{
    public function __construct (
        public readonly string $rfc,
        public readonly string $razons,
        public readonly string $email,
        public readonly string $regimen,
        public readonly int $codpos,
        public readonly ?string $usocfdi,
        public readonly ?string $calle,
        public readonly ?string $numero_exterior,
        public readonly ?string $numero_interior,
        public readonly ?string $colonia,
        public readonly ?string $ciudad,
        public readonly ?string $delegacion,
        public readonly ?string $estado,
        public readonly ?string $pais,
        public readonly ?string $numregidtrib,
        public readonly ?string $nombre,
        public readonly ?string $apellidos,
        public readonly ?string $telefono,
        public readonly ?string $email2,
        public readonly ?string $email3
    ) { }

    public static function fromRequest ( array $request ): self
    {
        return new self(
            rfc: $request['rfc'],
            razons: $request['razons'],
            email: $request['email'],
            regimen: $request['regimen'],
            codpos: $request['codpos'],
            usocfdi: $request['usocfdi'] ? $request['usocfdi'] : null,
            calle: $request['calle'] ? $request['calle'] : null,
            numero_exterior: $request['numero_exterior'] ? $request['numero_exterior'] : null,
            numero_interior: $request['numero_interior'] ? $request['numero_interior'] : null,
            colonia: $request['colonia'] ? $request['colonia'] : null,
            ciudad: $request['ciudad'] ? $request['ciudad'] : null,
            delegacion: $request['delegacion'] ? $request['delegacion'] : null,
            estado: $request['estado'] ? $request['estado'] : null,
            pais: $request['pais'] ? $request['pais'] : null,    
            numregidtrib: $request['numregidtrib'] ? $request['numregidtrib'] : null,
            nombre: $request['nombre'] ? $request['nombre'] : null,
            apellidos: $request['apellidos'] ? $request['apellidos'] : null,
            telefono: $request['telefono'] ? $request['telefono'] : null,
            email2: $request['email2'] ? $request['email2'] : null,
            email3: $request['email3'] ? $request['email3'] : null
        );
    }
}
