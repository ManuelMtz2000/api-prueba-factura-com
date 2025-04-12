<?php

namespace App\DTO;

class UpdateClientDto
{
    public function __construct(
        public ?string $rfc = null,
        public ?string $razons = null,
        public ?string $email = null,
        public ?string $regimen = null,
        public ?int $codpos = null,
        public ?string $usocfdi = null,
        public ?string $calle = null,
        public ?string $numero_exterior = null,
        public ?string $numero_interior = null,
        public ?string $colonia = null,
        public ?string $ciudad = null,
        public ?string $delegacion = null,
        public ?string $estado = null,
        public ?string $pais = null,
        public ?string $numregidtrib = null,
        public ?string $nombre = null,
        public ?string $apellidos = null,
        public ?string $telefono = null,
        public ?string $email2 = null,
        public ?string $email3 = null
    ) {}

    public static function fromRequest(array $request): self
    {
        return new self(
            rfc: $request['rfc'] ?? null,
            razons: $request['razons'] ?? null,
            email: $request['email'] ?? null,
            regimen: $request['regimen'] ?? null,
            codpos: isset($request['codpos']) ? (int)$request['codpos'] : null,
            usocfdi: $request['usocfdi'] ?? null,
            calle: $request['calle'] ?? null,
            numero_exterior: $request['numero_exterior'] ?? null,
            numero_interior: $request['numero_interior'] ?? null,
            colonia: $request['colonia'] ?? null,
            ciudad: $request['ciudad'] ?? null,
            delegacion: $request['delegacion'] ?? null,
            estado: $request['estado'] ?? null,
            pais: $request['pais'] ?? null,
            numregidtrib: $request['numregidtrib'] ?? null,
            nombre: $request['nombre'] ?? null,
            apellidos: $request['apellidos'] ?? null,
            telefono: $request['telefono'] ?? null,
            email2: $request['email2'] ?? null,
            email3: $request['email3'] ?? null,
        );
    }

    public function toArray(): array
    {
        return get_object_vars($this);
    }
}
