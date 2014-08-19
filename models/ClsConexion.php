<?php
/*
    Autor           :   Armando Enrique Pisfil Puemape
    Fecha           :   15/08/2014
    Clase           :   ClsConexion
    Estado          :   OK
    twitter         :   @armandoaepp
*/
 Class ClsConexion
{

    private static $db_host = '127.0.0.1';
    private static $db_user = 'root';
    private static $db_pass = '';
    protected $db_driver = 'mysql';

    protected $db_name   = 'planeatec_sa';
    protected $query;
    protected $rows      = array();
    protected $conn      = null  ;

    # Conectar a la base de datos utilizamos la libreria pdo
    private function open_connection()
    {
        $cadena=$this->db_driver.":host=".self::$db_host.";dbname=" .$this->db_name;
        $this->conn = new PDO($cadena,self::$db_user,self::$db_pass);
        # para manejar errores y excepcciones especiales para el manejo de transacciones
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        # codificacion utf-8
        $this->conn->query("SET NAMES 'utf8'");
    }

    # Desconectar la base de datos
    private function close_connection()
    {
        $this->conn = null;
    }
    # Iniciar un transaccion
    public function beginTransaction()
    {
        if( $this->conn == null )
        {
            # nos conectamos
                $this->open_connection();
            # iniciamos la transaccion
                $this->conn->beginTransaction();
        }
        elseif( $this->conn != null )
        {
            # iniciamos la transaccion
                $this->conn->beginTransaction();
        }
    }

    # si a tenido existo hacemos un commit para volcar los datos
    public function commit()
    {
        $this->conn->commit();
        $this->close_connection();
    }
    # si hay errores para dehacer el volcado de datos
    public function rollback()
    {
        $this->conn->rollback();
        $this->close_connection();
    }

    # este metoo nos siver para iniciar la conexion desde una capa externa al models
    # trabajar con multiples clases
    public function get_connection()
    {
        $this->open_connection() ;
        return $this->conn;
    }


    # ESPECIAL PARA SQL A NIVEL DE APLICACIÓN
    # Ejecutar un query simple del tipo INSERT, DELETE, UPDATE
    protected function execute_single_query()
    {
        # conn si es vdd entonces esta iniciada una transaccion
        if( $this->conn == null )
            $this->open_connection();
        # prepare query
        $stm = $this->conn->prepare($this->query);
        $stm->execute() ;
    }
    /**
     * [execute_query EJECUTAR UN QUERY DEL ITPO INSERT , DELETE , UPDATE , SELECT]
     * @return [type] [SI ES UN SELECT RETORNO UN ARRAY CON DATOS LOS CUALES PUEDEN SER ACCEDIDOS POR LOS NOMBRES DE COLUMNAS]
     */
    protected function execute_query()
    {
        $data = array();
        # conn si es nulo inicializamos la conexion
         if( $this->conn == null )
            $this->open_connection();

        $stm = $this->conn->prepare($this->query);
        if($stm->execute())
        {
            # Verificacmos si el resultado tiene columnas para no tener problemas con los INSERT, UPDATE o DELETE
            # esto para que el metodo de conexion no duelva error cuando se trabaja con transacciones
            $cuenta_col = $stm->columnCount() ;
            if ($cuenta_col > 0)
            {
                $data  = $stm->fetchAll(PDO::FETCH_ASSOC) ; # solo se accede por nombres de columnas y facil convertir en json
            }
            $this->rows = array("cuerpo"=> $data );
        }
    }

    # SOLO PARA SELECT SI SE LLAMA DENTRO DE UNA TRANSACCION ESTE METODO DESHACE LA TRANSACCION
    protected function get_results_from_query()
    {

        $this->open_connection();
        $stm = $this->conn->prepare($this->query);
        $stm->execute() ;
        $this->rows= array("cuerpo"=> $stm->fetchAll(PDO::FETCH_ASSOC));

        $this->close_connection();
    }

}

