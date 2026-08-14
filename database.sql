CREATE DATABASE chemical_management_system;

USE chemical_management_system;

-- =========================
-- ROLE TABLE
-- =========================
CREATE TABLE role (
    role_id VARCHAR(10) PRIMARY KEY,
    role_name VARCHAR(50) NOT NULL
);

-- =========================
-- USER TABLE
-- =========================
CREATE TABLE user (
    user_id VARCHAR(10) PRIMARY KEY,
    role_id VARCHAR(10) NOT NULL,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    CONSTRAINT fk_user_role
        FOREIGN KEY (role_id)
        REFERENCES role(role_id)
);

-- =========================
-- CLIENT TABLE
-- =========================
CREATE TABLE client (
    client_id VARCHAR(10) PRIMARY KEY,
    company_name VARCHAR(150) NOT NULL,
    contact_person VARCHAR(100) NOT NULL,
    contact_number VARCHAR(20) NOT NULL,
    shipping_address VARCHAR(255) NOT NULL,
    email VARCHAR(100)
);

-- =========================
-- CHEMICAL TABLE
-- =========================
CREATE TABLE chemical (
    chemical_id VARCHAR(10) PRIMARY KEY,
    chemical_name VARCHAR(100) NOT NULL,
    hazard VARCHAR(100),
    unit_price DECIMAL(10,2) NOT NULL
);

-- =========================
-- INVENTORY TABLE
-- =========================
CREATE TABLE inventory (
    inventory_id VARCHAR(10) PRIMARY KEY,
    chemical_id VARCHAR(10) UNIQUE NOT NULL,
    stock_quantity INT NOT NULL DEFAULT 0,
    last_updated TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        ON UPDATE CURRENT_TIMESTAMP,

    CONSTRAINT fk_inventory_chemical
        FOREIGN KEY (chemical_id)
        REFERENCES chemical(chemical_id)
);

-- =========================
-- ORDERS TABLE
-- =========================
CREATE TABLE orders (
    order_id VARCHAR(10) PRIMARY KEY,
    client_id VARCHAR(10) NOT NULL,
    user_id VARCHAR(10) NOT NULL,
    order_date DATE NOT NULL,
    total_amount DECIMAL(10,2) DEFAULT 0,
    total_profit DECIMAL(10,2) DEFAULT 0,

    CONSTRAINT fk_order_client
        FOREIGN KEY (client_id)
        REFERENCES client(client_id),

    CONSTRAINT fk_order_user
        FOREIGN KEY (user_id)
        REFERENCES user(user_id)
);

-- =========================
-- ORDER ITEM TABLE
-- =========================
CREATE TABLE order_item (
    order_item_id VARCHAR(10) PRIMARY KEY,
    order_id VARCHAR(10) NOT NULL,
    chemical_id VARCHAR(10) NOT NULL,
    quantity INT NOT NULL,
    unit_price DECIMAL(10,2) NOT NULL,
    profit_per_item DECIMAL(10,2) DEFAULT 0,

    CONSTRAINT fk_orderitem_order
        FOREIGN KEY (order_id)
        REFERENCES orders(order_id),

    CONSTRAINT fk_orderitem_chemical
        FOREIGN KEY (chemical_id)
        REFERENCES chemical(chemical_id)
);

-- =========================
-- STOCK TRANSACTION TABLE
-- =========================
CREATE TABLE stock_transaction (
    transaction_id VARCHAR(10) PRIMARY KEY,
    chemical_id VARCHAR(10) NOT NULL,
    user_id VARCHAR(10) NOT NULL,
    transaction_type ENUM('IN','OUT') NOT NULL,
    quantity INT NOT NULL,
    remarks VARCHAR(255),
    transaction_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    CONSTRAINT fk_transaction_chemical
        FOREIGN KEY (chemical_id)
        REFERENCES chemical(chemical_id),

    CONSTRAINT fk_transaction_user
        FOREIGN KEY (user_id)
        REFERENCES user(user_id)
);

-- =========================
-- DEFAULT ROLES
-- =========================
INSERT INTO role (role_id, role_name)
VALUES
('ROL001', 'Admin'),
('ROL002', 'Sales Clerk'),
('ROL003', 'Inventory Manager');
