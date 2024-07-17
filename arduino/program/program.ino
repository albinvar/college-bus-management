// Define the GPIO pins connected to the relay module
#define RELAY1 4
#define RELAY2 5
#define RELAY3 6
#define RELAY4 7

void setup() {
  // Initialize the GPIO pins as outputs
  pinMode(RELAY1, OUTPUT);
  pinMode(RELAY2, OUTPUT);
  pinMode(RELAY3, OUTPUT);
  pinMode(RELAY4, OUTPUT);

  // Initially turn off all relays (assuming active-low configuration)
  digitalWrite(RELAY1, HIGH);
  digitalWrite(RELAY2, HIGH);
  digitalWrite(RELAY3, HIGH);
  digitalWrite(RELAY4, HIGH);
}

void loop() {
  // Turn on all relays
  digitalWrite(RELAY1, LOW); // Turn on relay 1
  delay(1000);
  digitalWrite(RELAY2, LOW); // Turn on relay 2
  delay(1000);
  digitalWrite(RELAY3, LOW); // Turn on relay 3
  delay(1000);
  digitalWrite(RELAY4, LOW); // Turn on relay 4
  delay(1000);               // Wait for 1 second

  // Turn off all relays
  digitalWrite(RELAY1, HIGH); // Turn off relay 1
  delay(1000);
  digitalWrite(RELAY2, HIGH); // Turn off relay 2
  delay(1000);
  digitalWrite(RELAY3, HIGH); // Turn off relay 3
  delay(1000);
  digitalWrite(RELAY4, HIGH); // Turn off relay 4
  delay(1000);                // Wait for 1 second
}
