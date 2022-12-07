var trip_list = [];

createNodeElementTripDetails = (id) => {
  //
  node_trip_date_time = document.createElement('div');
  node_trip_date_time.className = 'trip-date-time';
  node_trip_date_time.id = id;
  node_trip_date_time.innerHTML = "<p>{datetime}</p>";
  //
  node_trip_destinations_details = document.createElement('div');
  node_trip_destinations_details.className = 'trip-destinations-details';
  node_trip_destinations_details.innerHTML = "<p>{destinations}</p>";
  //
  node_trip_details = document.createElement('div');
  node_trip_details.className = 'trip-details';
  node_trip_details.append(node_trip_date_time);
  node_trip_details.append(node_trip_destinations_details);

  node_trip = document.createElement('li');
  node_trip.className = 'trip';
  node_trip.append(node_trip_details);

  return node_trip;
}

const appendNodeElementToList = (id) => {
  //
  $ul_list.append(createNodeElementTripDetails(id));
}
