<?php

namespace App\Entity;

use App\Repository\FacturaRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use DateTime;
#[ORM\Entity(repositoryClass: FacturaRepository::class)]
class Factura
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'facturas')]
    private ?Cliente $cliente = null;

    #[ORM\ManyToOne(inversedBy: 'facturas')]
    private ?Proveedor $proveedor = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $dategen = null;

    public function __construct()
    {
        $this->dategen = new DateTime();
     
    }



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCliente(): ?Cliente
    {
        return $this->cliente;
    }

    public function setCliente(?Cliente $cliente): self
    {
        $this->cliente = $cliente;

        return $this;
    }

    public function getProveedor(): ?Proveedor
    {
        return $this->proveedor;
    }

    public function setProveedor(?Proveedor $proveedor): self
    {
        $this->proveedor = $proveedor;

        return $this;
    }

    public function getDategen(): ?\DateTimeInterface
    {
        return $this->dategen;
    }

    public function setDategen(?\DateTimeInterface $dategen): self
    {
        $this->dategen = $dategen;

        return $this;
    }

    
}
