
# PC Builder
I'm developing a system that will help individuals configure desktop builds using different components. Once components such as **Processors**, **Memory Modules** and **Motherboards** (etc) are listed and added to the database, users will be able to use this too to fins out which components are cross compatible with each other, and find out which system builds may face compatibility issues.
## Components
When adding components to the system, certain specs will have to be specified that will allow the system to check compatibility between components.

For e.g. To check which **Motherboard** would be compatible with a specific **Processor:**
**Processor A has:**
* **Socket**: LGA1151
* Compatible **Memory** speeds: DDR4-1866/2133, DDR3L-1333/1600
* **Chip-set**: Z170

**Motherboard A has:**
* **Socket**: LGA1151
* Compatible **Memory** speeds: DDR4-1866/2133/2666/2800/3000/3200
* **Chip-set**: Z170

Only if all these checks have specs that fall within each others support will they be labelled as compatible.

## Systems
The build wizard will help the user build a compatible system by filtering components to add to the system based on the components already selected. If the user has already selected a compatible **Motherboard** and **Processor**, when the user goes to select another component the list of options will be filtered tailored to spec requirements of **ALL** the components in the system. 

For e.g. The user wants to select a **Power Supply**: 
* User has selected a **GPU** that requires up to **500w** of power draw at peak load
* User has also selected a **CPU** that requires **200w** of power during heavy load
* The list of compatible **Power Supplies** will be filtered to units that can supply a minimum of **700w**

Another e.g. The user then wants to select a **Memory** kit for the system:
* The **CPU** will be checked to make sure that it supports the type and speed of **Memory** 
* The **Motherboard** will be checked to make sure it has the correct amount and type of memory slot, as well as checking as the supported speed of the **Chip-set** is matched 
* If it turns out that a particular **Memory** kit may draw a significant amount of power, you will be alerted that you may be exceeding the power rating that your **Power Supply** can handle

## Inventory
Your inventory is a place where you can add components you may already have available to you without having to account for the financial cost. This can be used in the build wizard by selecting a component you have in stock. When the user does they will be prompted weather or not to add the system component from the inventory. If the item is selected from inventory, the cost of that component will be negated from the total cost of the system, and 1 quantity of the component adjusted off you inventory holding.
