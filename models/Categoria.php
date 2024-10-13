<?php
class Categoria extends Conectar {
    
    // Método para obtener todas las categorías
    public function get_categoria() {
        $conectar = parent::Conexion();
        parent::set_name();
        $sql = "SELECT * FROM tm_categoria WHERE cat_est = 1";
        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    // Método para obtener una categoría por ID
    public function get_categoria_x_id($cat_id) {
        $conectar = parent::Conexion();
        parent::set_name();
        $sql = "SELECT * FROM tm_categoria WHERE cat_est = 1 AND cat_id = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $cat_id);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    // Método para insertar una nueva categoría
    public function insert_categoria($cat_nom, $cat_obs) {
        $conectar = parent::Conexion();
        parent::set_name();
        $sql = "INSERT INTO tm_categoria (cat_id, cat_nombre, cat_obs, cat_est) VALUES (NULL, ?, ?, 1)";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $cat_nom);
        $sql->bindValue(2, $cat_obs);  
        $resultado = $sql->execute();   
        return $resultado;              
    }
        // Método para actualizar una categoría
        public function update_categoria($cat_id, $cat_nom, $cat_obs) {
            $conectar = parent::Conexion();
            parent::set_name();
            $sql = "UPDATE tm_categoria set cat_nombre=? , cat_obs=? WHERE cat_id=?";
            $sql = $conectar->prepare($sql);
            $sql->bindValue(1, $cat_nom);
            $sql->bindValue(2, $cat_obs);
            $sql->bindValue(3, $cat_id);  
            $resultado = $sql->execute();   
            return $sql->execute();              
        }
        // Método para eliminar una categoría
        public function delete_categoria($cat_id) {
            $conectar = parent::Conexion();
            parent::set_name();
            $sql = "UPDATE tm_categoria set cat_est=0 WHERE cat_id=?";
            $sql = $conectar->prepare($sql);
            $sql->bindValue(1, $cat_id); 
            $resultado = $sql->execute();   
            return $sql->execute();              
        }
}
?>