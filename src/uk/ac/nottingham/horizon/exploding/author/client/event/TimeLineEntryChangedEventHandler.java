package uk.ac.nottingham.horizon.exploding.author.client.event;

import com.google.gwt.event.shared.EventHandler;

public interface TimeLineEntryChangedEventHandler extends EventHandler{

	 void onEntryChanged(TimeLineEntryChangedEvent event);

} 
