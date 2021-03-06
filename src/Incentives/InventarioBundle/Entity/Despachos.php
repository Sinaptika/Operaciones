<?php

namespace Incentives\InventarioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Despachos
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Despachos
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="documento", type="string", length=255, nullable=true)
     */
    private $documento;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=255, nullable=true)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="observaciones", type="string", length=500, nullable=true)
     */
    private $observaciones;
    
    /**
     * @var string
     *
     * @ORM\Column(name="ciudadNombre", type="string", length=255, nullable=true)
     */
    private $ciudadNombre;

    /**
     * @var string
     * @ORM\ManyToOne(targetEntity="Incentives\OperacionesBundle\Entity\Ciudad")
     * @ORM\JoinColumn(name="ciudad_id", referencedColumnName="id", nullable=true)
     */
    protected $ciudad;

    /**
     * @var string
     *
     * @ORM\Column(name="direccion", type="string", length=500, nullable=true)
     */
    private $direccion;

    /**
     * @var string
     *
     * @ORM\Column(name="barrio", type="string", length=255, nullable=true)
     */
    private $barrio;

    /**
     * @var string
     *
     * @ORM\Column(name="telefono", type="string", length=255, nullable=true)
     */
    private $telefono;

    /**
     * @var string
     *
     * @ORM\Column(name="celular", type="string", length=255, nullable=true)
     */
    private $celular;

    /**
     * @var string
     *
     * @ORM\Column(name="departamentoNombre", type="string", length=255, nullable=true)
     */
    private $departamentoNombre;

    /**
     * @var string
     *
     * @ORM\Column(name="nombreContacto", type="string", length=255, nullable=true)
     */
    private $nombreContacto;

    /**
     * @var string
     *
     * @ORM\Column(name="documentoContacto", type="string", length=255, nullable=true)
     */
    private $documentoContacto;

    /**
     * @var string
     *
     * @ORM\Column(name="ciudadContacto", type="string", length=255, nullable=true)
     */
    private $ciudadContacto;

    /**
     * @var string
     *
     * @ORM\Column(name="direccionContacto", type="string", length=500, nullable=true)
     */
    private $direccionContacto;

    /**
     * @var string
     *
     * @ORM\Column(name="barrioContacto", type="string", length=255, nullable=true)
     */
    private $barrioContacto;

    /**
     * @var string
     *
     * @ORM\Column(name="telefonoContacto", type="string", length=255, nullable=true)
     */
    private $telefonoContacto;

    /**
     * @var string
     *
     * @ORM\Column(name="celularContacto", type="string", length=255, nullable=true)
     */
    private $celularContacto;

    /**
     * @var string
     *
     * @ORM\Column(name="departamentoContacto", type="string", length=255, nullable=true)
     */
    private $departamentoContacto;
    
    /**
     * @ORM\ManyToOne(targetEntity="Incentives\CatalogoBundle\Entity\Producto")
     * @ORM\JoinColumn(name="producto_id", referencedColumnName="id", nullable=true)
     */
    protected $producto;
    
     /**
     * @var integer
     *
     * @ORM\Column(name="cantidad", type="integer", nullable=true)
     */
    private $cantidad;
    
    /**
     * @ORM\ManyToOne(targetEntity="Incentives\RedencionesBundle\Entity\Redenciones", inversedBy="despacho")
     * @ORM\JoinColumn(name="redencion_id", referencedColumnName="id", nullable=true)
     */
    protected $redencion;
    
    /**
     * 
     * @ORM\ManyToOne(targetEntity="Incentives\SolicitudesBundle\Entity\Solicitud")
     * @ORM\JoinColumn(name="solicitud_id", referencedColumnName="id", nullable=true)
     * 
     */
    protected $solicitud;
    
    
    /**
     * @ORM\ManyToOne(targetEntity="Incentives\InventarioBundle\Entity\Planilla")
     * @ORM\JoinColumn(name="planilla_id", referencedColumnName="id", nullable=true)
     */
    protected $planilla;
    
    /**
     * @ORM\ManyToOne(targetEntity="Incentives\SolicitudesBundle\Entity\DespachoOrdenes", cascade={"persist"}))
     * @ORM\JoinColumn(name="ordendespacho_id", referencedColumnName="id", nullable=true)
     */
    protected $ordendespacho;
    
    
    /**
     * @ORM\OneToMany(targetEntity="Incentives\InventarioBundle\Entity\DespachoGuia", mappedBy="despacho", cascade={"persist"})
     * 
     */
    protected $despachoguia;
    
    /**
     * @ORM\ManyToOne(targetEntity="Incentives\OrdenesBundle\Entity\OrdenesProducto")
     * @ORM\JoinColumn(name="ordenproducto_id", referencedColumnName="id", nullable=true)
     */
    protected $ordenproducto;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechaModificacion", type="datetime", nullable=true)
     */
    private $fechaModificacion;
    
    /**
     * 
     * @ORM\ManyToOne(targetEntity="Incentives\BaseBundle\Entity\Usuario")
     * @ORM\JoinColumn(name="usuario_id", referencedColumnName="id", nullable=true)
     * 
     */
    protected $usuario;


    

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->despachoguia = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set documento
     *
     * @param string $documento
     * @return Despachos
     */
    public function setDocumento($documento)
    {
        $this->documento = $documento;
    
        return $this;
    }

    /**
     * Get documento
     *
     * @return string 
     */
    public function getDocumento()
    {
        return $this->documento;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return Despachos
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    
        return $this;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set observaciones
     *
     * @param string $observaciones
     * @return Despachos
     */
    public function setObservaciones($observaciones)
    {
        $this->observaciones = $observaciones;
    
        return $this;
    }

    /**
     * Get observaciones
     *
     * @return string 
     */
    public function getObservaciones()
    {
        return $this->observaciones;
    }

    /**
     * Set ciudadNombre
     *
     * @param string $ciudadNombre
     * @return Despachos
     */
    public function setCiudadNombre($ciudadNombre)
    {
        $this->ciudadNombre = $ciudadNombre;
    
        return $this;
    }

    /**
     * Get ciudadNombre
     *
     * @return string 
     */
    public function getCiudadNombre()
    {
        return $this->ciudadNombre;
    }

    /**
     * Set direccion
     *
     * @param string $direccion
     * @return Despachos
     */
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;
    
        return $this;
    }

    /**
     * Get direccion
     *
     * @return string 
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * Set barrio
     *
     * @param string $barrio
     * @return Despachos
     */
    public function setBarrio($barrio)
    {
        $this->barrio = $barrio;
    
        return $this;
    }

    /**
     * Get barrio
     *
     * @return string 
     */
    public function getBarrio()
    {
        return $this->barrio;
    }

    /**
     * Set telefono
     *
     * @param string $telefono
     * @return Despachos
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
    
        return $this;
    }

    /**
     * Get telefono
     *
     * @return string 
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * Set celular
     *
     * @param string $celular
     * @return Despachos
     */
    public function setCelular($celular)
    {
        $this->celular = $celular;
    
        return $this;
    }

    /**
     * Get celular
     *
     * @return string 
     */
    public function getCelular()
    {
        return $this->celular;
    }

    /**
     * Set departamentoNombre
     *
     * @param string $departamentoNombre
     * @return Despachos
     */
    public function setDepartamentoNombre($departamentoNombre)
    {
        $this->departamentoNombre = $departamentoNombre;
    
        return $this;
    }

    /**
     * Get departamentoNombre
     *
     * @return string 
     */
    public function getDepartamentoNombre()
    {
        return $this->departamentoNombre;
    }

    /**
     * Set nombreContacto
     *
     * @param string $nombreContacto
     * @return Despachos
     */
    public function setNombreContacto($nombreContacto)
    {
        $this->nombreContacto = $nombreContacto;
    
        return $this;
    }

    /**
     * Get nombreContacto
     *
     * @return string 
     */
    public function getNombreContacto()
    {
        return $this->nombreContacto;
    }

    /**
     * Set documentoContacto
     *
     * @param string $documentoContacto
     * @return Despachos
     */
    public function setDocumentoContacto($documentoContacto)
    {
        $this->documentoContacto = $documentoContacto;
    
        return $this;
    }

    /**
     * Get documentoContacto
     *
     * @return string 
     */
    public function getDocumentoContacto()
    {
        return $this->documentoContacto;
    }

    /**
     * Set ciudadContacto
     *
     * @param string $ciudadContacto
     * @return Despachos
     */
    public function setCiudadContacto($ciudadContacto)
    {
        $this->ciudadContacto = $ciudadContacto;
    
        return $this;
    }

    /**
     * Get ciudadContacto
     *
     * @return string 
     */
    public function getCiudadContacto()
    {
        return $this->ciudadContacto;
    }

    /**
     * Set direccionContacto
     *
     * @param string $direccionContacto
     * @return Despachos
     */
    public function setDireccionContacto($direccionContacto)
    {
        $this->direccionContacto = $direccionContacto;
    
        return $this;
    }

    /**
     * Get direccionContacto
     *
     * @return string 
     */
    public function getDireccionContacto()
    {
        return $this->direccionContacto;
    }

    /**
     * Set barrioContacto
     *
     * @param string $barrioContacto
     * @return Despachos
     */
    public function setBarrioContacto($barrioContacto)
    {
        $this->barrioContacto = $barrioContacto;
    
        return $this;
    }

    /**
     * Get barrioContacto
     *
     * @return string 
     */
    public function getBarrioContacto()
    {
        return $this->barrioContacto;
    }

    /**
     * Set telefonoContacto
     *
     * @param string $telefonoContacto
     * @return Despachos
     */
    public function setTelefonoContacto($telefonoContacto)
    {
        $this->telefonoContacto = $telefonoContacto;
    
        return $this;
    }

    /**
     * Get telefonoContacto
     *
     * @return string 
     */
    public function getTelefonoContacto()
    {
        return $this->telefonoContacto;
    }

    /**
     * Set celularContacto
     *
     * @param string $celularContacto
     * @return Despachos
     */
    public function setCelularContacto($celularContacto)
    {
        $this->celularContacto = $celularContacto;
    
        return $this;
    }

    /**
     * Get celularContacto
     *
     * @return string 
     */
    public function getCelularContacto()
    {
        return $this->celularContacto;
    }

    /**
     * Set departamentoContacto
     *
     * @param string $departamentoContacto
     * @return Despachos
     */
    public function setDepartamentoContacto($departamentoContacto)
    {
        $this->departamentoContacto = $departamentoContacto;
    
        return $this;
    }

    /**
     * Get departamentoContacto
     *
     * @return string 
     */
    public function getDepartamentoContacto()
    {
        return $this->departamentoContacto;
    }

    /**
     * Set cantidad
     *
     * @param integer $cantidad
     * @return Despachos
     */
    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;
    
        return $this;
    }

    /**
     * Get cantidad
     *
     * @return integer 
     */
    public function getCantidad()
    {
        return $this->cantidad;
    }

    /**
     * Set fechaModificacion
     *
     * @param \DateTime $fechaModificacion
     * @return Despachos
     */
    public function setFechaModificacion($fechaModificacion)
    {
        $this->fechaModificacion = $fechaModificacion;
    
        return $this;
    }

    /**
     * Get fechaModificacion
     *
     * @return \DateTime 
     */
    public function getFechaModificacion()
    {
        return $this->fechaModificacion;
    }

    /**
     * Set ciudad
     *
     * @param \Incentives\OperacionesBundle\Entity\Ciudad $ciudad
     * @return Despachos
     */
    public function setCiudad(\Incentives\OperacionesBundle\Entity\Ciudad $ciudad = null)
    {
        $this->ciudad = $ciudad;
    
        return $this;
    }

    /**
     * Get ciudad
     *
     * @return \Incentives\OperacionesBundle\Entity\Ciudad 
     */
    public function getCiudad()
    {
        return $this->ciudad;
    }

    /**
     * Set producto
     *
     * @param \Incentives\CatalogoBundle\Entity\Producto $producto
     * @return Despachos
     */
    public function setProducto(\Incentives\CatalogoBundle\Entity\Producto $producto = null)
    {
        $this->producto = $producto;
    
        return $this;
    }

    /**
     * Get producto
     *
     * @return \Incentives\CatalogoBundle\Entity\Producto 
     */
    public function getProducto()
    {
        return $this->producto;
    }

    /**
     * Set redencion
     *
     * @param \Incentives\RedencionesBundle\Entity\Redenciones $redencion
     * @return Despachos
     */
    public function setRedencion(\Incentives\RedencionesBundle\Entity\Redenciones $redencion = null)
    {
        $this->redencion = $redencion;
    
        return $this;
    }

    /**
     * Get redencion
     *
     * @return \Incentives\RedencionesBundle\Entity\Redenciones 
     */
    public function getRedencion()
    {
        return $this->redencion;
    }

    /**
     * Set solicitud
     *
     * @param \Incentives\SolicitudesBundle\Entity\Solicitud $solicitud
     * @return Despachos
     */
    public function setSolicitud(\Incentives\SolicitudesBundle\Entity\Solicitud $solicitud = null)
    {
        $this->solicitud = $solicitud;
    
        return $this;
    }

    /**
     * Get solicitud
     *
     * @return \Incentives\SolicitudesBundle\Entity\Solicitud 
     */
    public function getSolicitud()
    {
        return $this->solicitud;
    }

    /**
     * Set planilla
     *
     * @param \Incentives\InventarioBundle\Entity\Planilla $planilla
     * @return Despachos
     */
    public function setPlanilla(\Incentives\InventarioBundle\Entity\Planilla $planilla = null)
    {
        $this->planilla = $planilla;
    
        return $this;
    }

    /**
     * Get planilla
     *
     * @return \Incentives\InventarioBundle\Entity\Planilla 
     */
    public function getPlanilla()
    {
        return $this->planilla;
    }

    /**
     * Add despachoguia
     *
     * @param \Incentives\InventarioBundle\Entity\DespachoGuia $despachoguia
     * @return Despachos
     */
    public function addDespachoguia(\Incentives\InventarioBundle\Entity\DespachoGuia $despachoguia)
    {
        $this->despachoguia[] = $despachoguia;
    
        return $this;
    }

    /**
     * Remove despachoguia
     *
     * @param \Incentives\InventarioBundle\Entity\DespachoGuia $despachoguia
     */
    public function removeDespachoguia(\Incentives\InventarioBundle\Entity\DespachoGuia $despachoguia)
    {
        $this->despachoguia->removeElement($despachoguia);
    }

    /**
     * Get despachoguia
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getDespachoguia()
    {
        return $this->despachoguia;
    }

    /**
     * Set usuario
     *
     * @param \Incentives\BaseBundle\Entity\Usuario $usuario
     * @return Despachos
     */
    public function setUsuario(\Incentives\BaseBundle\Entity\Usuario $usuario = null)
    {
        $this->usuario = $usuario;
    
        return $this;
    }

    /**
     * Get usuario
     *
     * @return \Incentives\BaseBundle\Entity\Usuario 
     */
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * Set ordenproducto
     *
     * @param \Incentives\OrdenesBundle\Entity\OrdenesProducto $ordenproducto
     * @return Despachos
     */
    public function setOrdenproducto(\Incentives\OrdenesBundle\Entity\OrdenesProducto $ordenproducto = null)
    {
        $this->ordenproducto = $ordenproducto;
    
        return $this;
    }

    /**
     * Get ordenproducto
     *
     * @return \Incentives\OrdenesBundle\Entity\OrdenesProducto 
     */
    public function getOrdenproducto()
    {
        return $this->ordenproducto;
    }

    /**
     * Set ordendespacho
     *
     * @param \Incentives\SolicitudesBundle\Entity\DespachoOrdenes $ordendespacho
     * @return Despachos
     */
    public function setOrdendespacho(\Incentives\SolicitudesBundle\Entity\DespachoOrdenes $ordendespacho = null)
    {
        $this->ordendespacho = $ordendespacho;
    
        return $this;
    }

    /**
     * Get ordendespacho
     *
     * @return \Incentives\SolicitudesBundle\Entity\DespachoOrdenes 
     */
    public function getOrdendespacho()
    {
        return $this->ordendespacho;
    }
}
