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
            usocfdi: isset($request['usocfdi']) ? $request['usocfdi'] : null,
            calle: isset($request['calle']) ? $request['calle'] : null,
            numero_exterior: isset($request['numero_exterior']) ? $request['numero_exterior'] : null,
            numero_interior: isset($request['numero_interior']) ? $request['numero_interior'] : null,
            colonia: isset($request['colonia']) ? $request['colonia'] : null,
            ciudad: isset($request['ciudad']) ? $request['ciudad'] : null,
            delegacion: isset($request['delegacion']) ? $request['delegacion'] : null,
            estado: isset($request['estado']) ? $request['estado'] : null,
            pais: isset($request['pais']) ? $request['pais'] : null,    
            numregidtrib: isset($request['numregidtrib']) ? $request['numregidtrib'] : null,
            nombre: isset($request['nombre']) ? $request['nombre'] : null,
            apellidos: isset($request['apellidos']) ? $request['apellidos'] : null,
            telefono: isset($request['telefono']) ? $request['telefono'] : null,
            email2: isset($request['email2']) ? $request['email2'] : null,
            email3: isset($request['email3']) ? $request['email3'] : null
        );
    }
}
