<?php

namespace App\DTO;

class GetClientDto
{
    public function __construct(
        public string $rfc,
        public string $razons,
        public string $email,
        public string $regimen,
        public int $codpos,
        public string $usocfdi,
        public string $calle,
        public string $numero_exterior,
        public string $numero_interior,
        public string $colonia,
        public string $ciudad,
        public string $delegacion,
        public string $estado,
        public string $pais,
        public string $numregidtrib,
        public string $nombre,
        public string $apellidos ,
        public string $telefono ,
        public string $email2 ,
        public string $email3
    ) { }

    public static function parse( array $request ) 
    {
        return new self(
            rfc: $request['RFC'],
            razons: $request['RazonSocial'],
            regimen: $request['RegimenId'],
            calle: $request['Calle'],
            numero_exterior: $request['Numero'],
            numero_interior: $request['Interior'],
            colonia: $request['Colonia'],
            ciudad: $request['Ciudad'],
            codpos: $request['CodigoPostal'] ? (int)$request['CodigoPostal'] : null,
            delegacion: $request['Delegacion'],
            estado: $request['Estado'],
            pais: $request['Pais'],
            numregidtrib: $request['NumRegIdTrib'],
            nombre: $request['Contacto']['Nombre'],
            apellidos: $request['Contacto']['Apellidos'],
            telefono: $request['Contacto']['Telefono'],
            email: $request['Contacto']['Email'],
            email2: $request['Contacto']['Email2'],
            email3: $request['Contacto']['Email3'],
            usocfdi: $request['UsoCFDI']
        );
    }

    public function toArray(): array 
    {
        return get_object_vars( $this );
    }
}