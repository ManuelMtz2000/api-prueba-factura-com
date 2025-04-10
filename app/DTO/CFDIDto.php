<?php

namespace App\DTO;

class CFDIDto
{
    public function __construct (
        public readonly ?int $page = 1,
        public readonly ?int $per_page = 10,
        public readonly ?int $month = null,
        public readonly ?int $year = null,
        public readonly ?string $rfc = null,
    ) { }

    public static function fromRequest ( array $queryParams ): self
    {
        return new self(
            page: isset( $queryParams['page'] ) ? ( int ) $queryParams['page'] : 1,
            per_page: isset( $queryParams['per_page'] ) ? ( int ) $queryParams['per_page'] : 10,
            month: isset( $queryParams['month'] ) ? ( int ) $queryParams['month'] : null,
            year: isset( $queryParams['year'] ) ? ( int ) $queryParams['year'] : null,
            rfc: isset( $queryParams['rfc'] ) ? $queryParams['rfc'] : null
        );
    }
}