-- Crear tabla users
CREATE TABLE users (
    id INT PRIMARY KEY IDENTITY(1,1),
    email VARCHAR(255) NOT NULL UNIQUE,
    nombre VARCHAR(255) NOT NULL,
    pass VARCHAR(255) NOT NULL,
    role VARCHAR(50) NOT NULL,
    created_at DATETIME DEFAULT GETDATE(),
    updated_at DATETIME DEFAULT GETDATE()
);

-- Crear tabla ingresos
CREATE TABLE ingresos (
    id INT PRIMARY KEY IDENTITY(1,1),
    identificador VARCHAR(255) NOT NULL UNIQUE,
    descripcion TEXT,
    fecha_ingreso DATETIME DEFAULT GETDATE(),
    estado VARCHAR(50) DEFAULT 'pendiente', -- estados posibles: 'pendiente', 'entregado', 'confirmado'
    usuario_id INT FOREIGN KEY REFERENCES users(id),
    entregado_a_liquidacion BIT DEFAULT 0,
    created_at DATETIME DEFAULT GETDATE(),
    updated_at DATETIME DEFAULT GETDATE()
);

-- Crear tabla liquidaciones
CREATE TABLE liquidaciones (
    id INT PRIMARY KEY IDENTITY(1,1),
    ingreso_id INT FOREIGN KEY REFERENCES ingresos(id),
    estado VARCHAR(50) DEFAULT 'pendiente', -- estados posibles: 'pendiente', 'confirmado', 'parcial', 'no_recibido'
    fecha_liquidacion DATETIME DEFAULT GETDATE(),
    usuario_id INT FOREIGN KEY REFERENCES users(id),
    created_at DATETIME DEFAULT GETDATE(),
    updated_at DATETIME DEFAULT GETDATE()
);

-- Crear tabla devoluciones
CREATE TABLE devoluciones (
    id INT PRIMARY KEY IDENTITY(1,1),
    ingreso_id INT FOREIGN KEY REFERENCES ingresos(id),
    motivo TEXT,
    fecha_devolucion DATETIME DEFAULT GETDATE(),
    usuario_id INT FOREIGN KEY REFERENCES users(id),
    created_at DATETIME DEFAULT GETDATE(),
    updated_at DATETIME DEFAULT GETDATE()
);
